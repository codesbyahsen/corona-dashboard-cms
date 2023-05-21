<?php

namespace App\Http\Controllers\Admin\SystemSettings;

use App\Http\Controllers\Controller;
use App\Services\GeneralSettingService;
use App\Http\Requests\GeneralSetup\UpdateOrStoreRequest;
use App\Traits\Timezone;

class GeneralSetupController extends Controller
{
    use Timezone;
    const ID = 1;

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
        $timezones = $this->getTimeZones();
        return view('admin.modules.system-settings.system-setup.general', compact('generalSetting', 'timezones'));
    }

    /**
     * Store or update resource in storage.
     */
    public function store(UpdateOrStoreRequest $request)
    {
        $result = $this->generalSettingService->updateOrStore(self::ID, $request->validated());
        if (!$result) {
            return redirect()->route('admin.general_settings')->with('error', 'Failed to create settings, try again.');
        }
        return redirect()->route('admin.general_settings')->with('success', 'Settings created successfully.');
    }
}
