<?php

namespace App\Http\Controllers\Admin\SystemSettings;

use App\Models\Page;
use App\Services\PageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\PrivacyPolicyRequest;
use App\Http\Requests\Page\TermsRequest;

class PageController extends Controller
{
    public function __construct(private PageService $pageService)
    {
    }

    /**
     * Show the terms and condition form for
     * creating or editing resource.
     */
    public function terms()
    {
        $terms = $this->pageService->get(Page::TYPE_TERMS);
        return view('admin.modules.system-settings.pages.terms', compact('terms'));
    }

    /**
     * Store or update resource in storage.
     */
    public function storeTerms(TermsRequest $request)
    {
        $result = $this->pageService->updateOrStore(Page::TYPE_TERMS, $request->validated());
        if (!$result) {
            return back()->with('error', 'Failed to create terms and conditions, try again.');
        }
        return redirect()->route('admin.terms')->with('success', 'The terms and conditions created successfully.');
    }

    /**
     * Show the privacy policies form for
     * creating or editing resource.
     */
    public function privacyPolicy()
    {
        $privacyPolicy = $this->pageService->get(Page::TYPE_PRIVACY_POLICY);
        return view('admin.modules.system-settings.pages.privacy', compact('privacyPolicy'));
    }

    /**
     * Store or update resource in storage.
     */
    public function storePrivacyPolicy(PrivacyPolicyRequest $request)
    {
        $result = $this->pageService->updateOrStore(Page::TYPE_PRIVACY_POLICY, $request->validated());
        if (!$result) {
            return back()->with('error', 'Failed to create privacy policy, try again.');
        }
        return redirect()->route('admin.privacy_policy')->with('success', 'The privacy policy created successfully.');
    }
}
