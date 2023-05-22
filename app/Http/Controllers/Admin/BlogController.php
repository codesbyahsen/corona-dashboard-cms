<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\BlogService;
use App\Services\BlogCategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreRequest;
use App\Http\Requests\Blog\UpdateRequest;

class BlogController extends Controller
{
    public function __construct(private BlogService $blogService, private BlogCategoryService $blogCategoryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = $this->blogService->getAll();
        return view('admin.modules.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCategories = $this->blogCategoryService->getAll();
        return view('admin.modules.blogs.create', compact('blogCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $result = $this->blogService->create($request->validated());

        if (!$result) {
            return back()->with('error', 'Failed to create blog, try again!');
        }
        return redirect()->route('admin.blogs')->with('success', 'The blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = decrypt($id);
        $blog = $this->blogService->get($id);
        return view('admin.modules.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = decrypt($id);
        $blogCategories = $this->blogCategoryService->getAll();
        $blog = $this->blogService->get($id);
        return view('admin.modules.blogs.edit', compact('blog', 'blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $result = $this->blogService->update($id, $request->validated());

        if (!$result) {
            return back()->with('error', 'Failed to update blog, try again!');
        }
        return redirect()->route('admin.blogs')->with('success', 'The blog updated successfully.');
    }

    /**
     * Update the specified status in storage
     */
    public function updateStatus(Request $request, $id)
    {
        $result = $this->blogService->updateStatus($id, $request->status);

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
        $result = $this->blogService->destroy($id);

        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'The blog deleted successfully'], 200);
    }
}
