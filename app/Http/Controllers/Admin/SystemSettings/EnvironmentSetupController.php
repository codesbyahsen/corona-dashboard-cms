<?php

namespace App\Http\Controllers\Admin\SystemSettings;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnvironmentSetup\UpdateOrStoreRequest;
use App\Services\EnvironmentSettingService;
use Illuminate\Http\Request;

class EnvironmentSetupController extends Controller
{
    const ID = 1;

    public function __construct(private EnvironmentSettingService $environmentSettingService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $environmentSetting = $this->environmentSettingService->get(self::ID);
        return view('admin.modules.system-settings.system-setup.environment', compact('environmentSetting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateOrStoreRequest $request)
    {
        $result = $this->environmentSettingService->updateOrStore(self::ID, $request->validated());
        if (!$result) {
            return back()->with('error', 'Failed to create settings, try again.');
        }
        return redirect()->route('admin.environment_settings')->with('success', 'Settings created successfully.');
    }
}
