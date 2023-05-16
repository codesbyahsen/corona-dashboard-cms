<?php

namespace App\Http\Controllers\Admin;

use App\Services\FaqService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\FaqCategoryService;
use App\Http\Requests\Faq\StoreRequest;
use App\Http\Requests\Faq\UpdateRequest;

class FaqController extends Controller
{
    private FaqService $faqService;
    private FaqCategoryService $faqCategoryService;

    public function __construct(FaqService $faqService, FaqCategoryService $faqCategoryService)
    {
        $this->faqService = $faqService;
        $this->faqCategoryService = $faqCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = $this->faqService->getAll();
        return view('admin.modules.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faqCategories = $this->faqCategoryService->getAll();
        return view('admin.modules.faqs.create', compact('faqCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $result = $this->faqService->create($request->validated());
        if (!$result) {
            return redirect()->route('admin.faqs')->with('error', 'Failed to create faq, try again.');
        }
        return redirect()->route('admin.faqs')->with('success', 'Faq created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = decrypt($id);
        $faq = $this->faqService->get($id);
        return view('admin.modules.faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = decrypt($id);
        $faqCategories = $this->faqCategoryService->getAll();
        $faq = $this->faqService->get($id);
        return view('admin.modules.faqs.edit', compact('faqCategories', 'faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $result = $this->faqService->update($id, $request->validated());
        if (!$result) {
            return redirect()->route('admin.faqs')->with('error', 'Failed to update faq, try again.');
        }
        return redirect()->route('admin.faqs')->with('success', 'Faq updated successfully.');
    }

    /**
     * Update the specified status in storage
     */
    public function updateStatus(Request $request, $id)
    {
        $result = $this->faqService->updateStatus($id, $request->status);

        if (!$result) {
            return back()->with('error', 'Failed to update faq status, try again!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->faqService->destroy($id);
        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'Faq deleted successfully.'], 200);
    }
}
