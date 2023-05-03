<?php

namespace App\Http\Controllers\Admin\SystemSettings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show the terms and condition form for
     * creating or editing resource.
     */
    public function terms()
    {
        return view('admin.modules.system-settings.pages.terms');
    }

    /**
     * Store or update resource in storage.
     */
    public function storeTerms()
    {

    }

    /**
     * Show the privacy policies form for
     * creating or editing resource.
     */
    public function privacy()
    {
        return view('admin.modules.system-settings.pages.privacy');
    }

    /**
     * Store or update resource in storage.
     */
    public function storePrivacy()
    {

    }
}
