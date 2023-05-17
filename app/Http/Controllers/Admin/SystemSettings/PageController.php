<?php

namespace App\Http\Controllers\Admin\SystemSettings;

use App\Models\Page;
use App\Services\PageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\PrivacyPolicyRequest;
use App\Http\Requests\Page\TermsAndConditionsRequest;

class PageController extends Controller
{
    public function __construct(private PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    /**
     * Show the terms and condition form for
     * creating or editing resource.
     */
    public function termsAndConditions()
    {
        return view('admin.modules.system-settings.pages.terms');
    }

    /**
     * Store or update resource in storage.
     */
    public function storeTermsAndConditions(TermsAndConditionsRequest $request)
    {
        $result = $this->pageService->updateOrStore(Page::TYPE_TERMS_AND_CONDITIONS, $request->validated());
        if (!$result) {
            return back()->with('error', 'Failed to create terms and conditions, try again.');
        }
        return redirect()->route('admin.general_settings')->with('success', 'The terms and conditions created successfully.');
    }

    /**
     * Show the privacy policies form for
     * creating or editing resource.
     */
    public function privacyPolicy()
    {
        return view('admin.modules.system-settings.pages.privacy');
    }

    /**
     * Store or update resource in storage.
     */
    public function storePrivacyPolicy(PrivacyPolicyRequest $request)
    {
        $result = $this->pageService->updateOrStore(Page::TYPE_PRIVACY_POLICIES, $request->validated());
        if (!$result) {
            return back()->with('error', 'Failed to create privacy policy, try again.');
        }
        return redirect()->route('admin.privacy_policy')->with('success', 'The privacy policy created successfully.');
    }
}
