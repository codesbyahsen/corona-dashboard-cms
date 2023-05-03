<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategory\StoreRequest;
use App\Http\Requests\BlogCategory\UpdateRequest;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public BlogCategory $blogCategory;

    public function __construct(BlogCategory $blogCategory)
    {
        $this->blogCategory = $blogCategory;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategories = $this->blogCategory->getAllBlogCategories();
        return view('admin.modules.blog-categories.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.blog-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $result = $this->blogCategory->createBlogCategory($request->validated());

        if (!$result) {
            return back()->with('error', 'Something went wrong, try again!');
        }
        return redirect()->route('blog.categories')->with('success', 'The blog category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = decrypt($id);
        $blogCategory = $this->blogCategory->getBlogCategory($id);
        return view('admin.modules.blog-categories.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $id = decrypt($id);
        $result = $this->blogCategory->updateBlogCategory($id, $request->validated());

        if (!$result) {
            return back()->with('error', 'Something went wrong, try again!');
        }
        return redirect()->route('blog.categories')->with('success', 'The blog category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = decrypt($id);
        $result = $this->blogCategory->destroyBlogCategory($id);

        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'The blog category deleted successfully'], 200);
    }
}
