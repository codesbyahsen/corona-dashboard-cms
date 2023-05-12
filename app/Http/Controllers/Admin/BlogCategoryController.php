<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategory\StoreRequest;
use App\Http\Requests\BlogCategory\UpdateRequest;
use App\Services\BlogCategoryService;

class BlogCategoryController extends Controller
{
    public BlogCategoryService $blogCategoryService;

    public function __construct(BlogCategoryService $blogCategoryService)
    {
        $this->blogCategoryService = $blogCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategories = $this->blogCategoryService->getAllBlogCategories();
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
        $result = $this->blogCategoryService->createBlogCategory($request->validated());

        if (!$result) {
            return back()->with('error', 'Failed to create blog category, try again!');
        }
        return redirect()->route('admin.blog.categories')->with('success', 'The blog category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = decrypt($id);
        $blogCategory = $this->blogCategoryService->getBlogCategory($id);
        return view('admin.modules.blog-categories.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $result = $this->blogCategoryService->updateBlogCategory($id, $request->validated());

        if (!$result) {
            return back()->with('error', 'Failed to update blog category, try again!');
        }
        return redirect()->route('admin.blog.categories')->with('success', 'The blog category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->blogCategoryService->destroyBlogCategory($id);

        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'The blog category deleted successfully'], 200);
    }
}
