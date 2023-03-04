<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Traits\FileUpload;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreRequest;
use App\Http\Requests\Blog\UpdateRequest;

class BlogController extends Controller
{
    use FileUpload;

    public Blog $blog;
    public BlogCategory $blogCategory;
    const PATH_BLOG_IMAGE = 'blog/main-image';

    public function __construct(Blog $blog, BlogCategory $blogCategory)
    {
        $this->blog = $blog;
        $this->blogCategory = $blogCategory;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = $this->blog->getAll();
        return view('modules.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCategories = $this->blogCategory->getAll();
        return view('modules.blogs.create', compact('blogCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = 'blog_' . time() . '.' . $request->image->extension();
        }

        // replace image value with custom image name
        $blog = array_replace($request->validated(), array('image' => $imageName));

        $result = $this->blog->create($blog);

        // store blog categories
        if (isset($result)) {
            foreach ($request->category as $id) {
                DB::table('category_blog')->insert(['blog_category_id' => $id, 'blog_id' => $result->id, 'created_at' => now(), 'updated_at' => now()]);
            }
        }

        $this->handleUploadFile($request->image, self::PATH_BLOG_IMAGE, $imageName);

        if (!$result) {
            return back()->with('error', 'Something went wrong, try again!');
        }
        return redirect()->route('blogs')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = decrypt($id);
        $blogCategories = $this->blogCategory->getAll();
        $blog = $this->blog->get($id);
        return view('modules.blogs.edit', compact('blog', 'blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $id = decrypt($id);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = 'blog_' . time() . '.' . $request->image->extension();
        } else {
            $imageName = $this->blog->getColumnValue($id, 'image');
        }

        // replace image value with custom image name
        $blog = array_replace($request->validated(), array('image' => $imageName));

        $result = $this->blog->get($id)->update($blog);
        $this->handleUploadFile($request->image, self::PATH_BLOG_IMAGE, $imageName);

        if (!$result) {
            return back()->with('error', 'Something went wrong, try again!');
        }
        return redirect()->route('blogs')->with('success', 'Blog updated successfully.');
    }

    /**
     * Update the specified status in storage
     */
    public function updateStatus($id)
    {
        $id = decrypt($id);
        $blog = $this->blog->get($id);
        $status = ($blog->is_active == Blog::STATUS_ACTIVE ? Blog::STATUS_INACTIVE : Blog::STATUS_ACTIVE);
        // dd($status);
        $result = $this->blog->get($id)->update(['is_active' => $status]);

        if (!isset($result)) {
            return back()->with('error', 'Something went wrong, try again!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = decrypt($id);
        $result = $this->blog->get($id)->delete();

        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'Blog deleted successfully'], 200);
    }
}
