<?php

namespace App\Http\Controllers\Admin;

use App\Traits\FileUpload;
use Illuminate\Http\Request;
use App\Services\BlogService;
use App\Services\BlogCategoryService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreRequest;
use App\Http\Requests\Blog\UpdateRequest;

class BlogController extends Controller
{
    use FileUpload;

    public BlogService $blogService;
    public BlogCategoryService $blogCategoryService;
    const PATH_BLOG_IMAGE = 'blog/main-image';

    public function __construct(BlogService $blogService, BlogCategoryService $blogCategoryService)
    {
        $this->blogService = $blogService;
        $this->blogCategoryService = $blogCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = $this->blogService->getAllBlogs();
        return view('admin.modules.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCategories = $this->blogCategoryService->getAllBlogCategories();
        return view('admin.modules.blogs.create', compact('blogCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = 'blog_' . uniqid() . '_' . time() . '.' . $request->image->extension();
        }

        // replace image value with custom image name
        $blog = array_replace($request->validated(), array('image' => $imageName));

        $result = $this->blogService->createBlog($blog);

        // store blog categories
        if (isset($result)) {
            foreach ($request->category as $id) {
                DB::table('category_blog')->insert(['blog_category_id' => $id, 'blog_id' => $result->id, 'created_at' => now(), 'updated_at' => now()]);
            }
        }

        $this->handleUploadFile($request->image, self::PATH_BLOG_IMAGE, $imageName);

        if (!$result) {
            return back()->with('error', 'Failed to create blog, try again!');
        }
        return redirect()->route('blogs')->with('success', 'The blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = decrypt($id);
        $blog = $this->blogService->getBlogWithCategories($id);
        return view('admin.modules.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = decrypt($id);
        $blogCategories = $this->blogCategoryService->getAllBlogCategories();
        $blog = $this->blogService->getBlog($id);
        return view('admin.modules.blogs.edit', compact('blog', 'blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $id = decrypt($id);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = 'blog_' . uniqid() . '_' . time() . '.' . $request->image->extension();
        } else {
            $imageName = $this->blogService->getBlogColumnValue($id, 'image');
        }

        // replace image value with custom image name
        $blog = array_replace($request->validated(), array('image' => $imageName));

        $result = $this->blogService->updateBlog($id, $blog);
        $this->handleUploadFile($request->image, self::PATH_BLOG_IMAGE, $imageName);

        if (!$result) {
            return back()->with('error', 'Failed to update blog, try again!');
        }
        return redirect()->route('blogs')->with('success', 'The blog updated successfully.');
    }

    /**
     * Update the specified status in storage
     */
    public function updateStatus(Request $request, $id)
    {
        $id = decrypt($id);
        $result = $this->blogService->updateBlogStatus($id, $request->is_active);

        if (!$result) {
            return back()->with('error', 'Failed to update blog status, try again!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = decrypt($id);
        $result = $this->blogService->destroyBlog($id);

        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'The blog deleted successfully'], 200);
    }
}
