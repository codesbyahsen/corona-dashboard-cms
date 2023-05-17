<?php

namespace App\Http\Controllers\Admin\SystemSettings;

use App\Http\Controllers\Controller;
use App\Services\GeneralSettingService;
use App\Http\Requests\GeneralSetup\UpdateOrStoreRequest;
use App\Traits\FileUpload;

class GeneralSetupController extends Controller
{
    use FileUpload;
    const ID = 1;
    const PATH = 'general-settings';

    public function __construct(private GeneralSettingService $generalSettingService)
    {
        $this->generalSettingService = $generalSettingService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generalSetting = $this->generalSettingService->get(self::ID);
        return view('admin.modules.system-settings.system-setup.general', compact('generalSetting'));
    }

    /**
     * Store or update resource in storage.
     */
    public function store(UpdateOrStoreRequest $request)
    {
        $logo = $favicon = null;
        if ($request->hasFile('logo')) {
            $logo = 'company_logo_' . uniqid() . '_' . time() . '.' . $request->logo->extension();
        }

        if ($request->hasFile('favicon')) {
            $favicon = 'company_favicon_' . uniqid() . '_' . time() . '.' . $request->favicon->extension();
        }

        // replace logo & favicon value with custom names
        $generalSetting = array_replace($request->validated(), array('logo' => $logo, 'favicon' => $favicon));

        $this->handleUploadFile($request->logo, self::PATH, $logo);
        $this->handleUploadFile($request->favicon, self::PATH, $favicon);

        $result = $this->generalSettingService->updateOrStore(self::ID, $generalSetting);
        if (!$result) {
            return redirect()->route('admin.general_settings')->with('error', 'Failed to create settings, try again.');
        }
        return redirect()->route('admin.general_settings')->with('success', 'Settings created successfully.');
    }
}
