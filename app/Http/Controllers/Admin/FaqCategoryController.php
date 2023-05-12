<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FaqCategoryService;
use App\Http\Requests\FaqCategory\StoreRequest;
use App\Http\Requests\FaqCategory\UpdateRequest;

class FaqCategoryController extends Controller
{
    private FaqCategoryService $faqCategoryService;

    public function __construct(FaqCategoryService $faqCategoryService)
    {
        $this->faqCategoryService = $faqCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqCategories = $this->faqCategoryService->getAllFaqCategories();
        return view('admin.modules.faqs.categories.index', compact('faqCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.faqs.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $result = $this->faqCategoryService->createFaqCategory($request->validated());
        if (!$result) {
            return redirect()->route('admin.faq_categories')->with('error', 'Failed to create faq category, try again.');
        }
        return redirect()->route('admin.faq_categories')->with('success', 'Faq category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = decrypt($id);
        $faqCategory = $this->faqCategoryService->getFaqCategory($id);
        return view('admin.modules.faqs.categories.edit', compact('faqCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $result = $this->faqCategoryService->updateFaqCategory($id, $request->validated());
        if (!$result) {
            return redirect()->route('admin.faq_categories')->with('error', 'Failed to update faq category, try again.');
        }
        return redirect()->route('admin.faq_categories')->with('success', 'Faq category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->faqCategoryService->destroyFaqCategory($id);
        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'Faq category deleted successfully.'], 200);
    }
}
