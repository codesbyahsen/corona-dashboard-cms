<?php

namespace App\Http\Controllers\Admin\SystemSettings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MailConfigurationService;
use App\Http\Requests\MailConfiguration\StoreRequest;
use App\Http\Requests\MailConfiguration\UpdateRequest;

class MailConfigurationController extends Controller
{
    private MailConfigurationService $mailConfigurationService;

    public function __construct(MailConfigurationService $mailConfigurationService)
    {
        $this->mailConfigurationService = $mailConfigurationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mailConfigurations = $this->mailConfigurationService->getAllMailConfigurations();
        return view('admin.modules.system-settings.mail-configuration.index', compact('mailConfigurations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.system-settings.mail-configuration.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $result = $this->mailConfigurationService->createMailConfiguration($request->validated());
        if (!$result) {
            return redirect()->route('admin.smtp')->with('error', 'Failed to create mail configuration, try again.');
        }
        return redirect()->route('admin.smtp')->with('success', 'Mail configuration created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mailConfiguration = $this->mailConfigurationService->getMailConfiguration($id);
        return view('admin.modules.system-settings.mail-configuration.show', compact('mailConfiguration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mailConfiguration = $this->mailConfigurationService->getMailConfiguration($id);
        return view('admin.modules.system-settings.mail-configuration.edit', compact('mailConfiguration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $id = decrypt($id);

        $result = $this->mailConfigurationService->updateMailConfiguration($id, $request->validated());
        if (!$result) {
            return back()->with('error', 'Failed to update mail configuration, try again.');
        }
        return redirect()->route('admin.smtp')->with('success', 'The mail configuration updated successfully.');
    }

    /**
     * Update the specified resource status in storage.
     */
    public function updateStatus(Request $request, string $id)
    {
        $status = $this->mailConfigurationService->updateMailConfigurationStatus($id, $request->status);
        if (!$status) {
            return back()->with('error', 'Failed to update mail configuration status, try again.');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->mailConfigurationService->destroyMailConfiguration($id);
        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'Mail configuration deleted successfully.'], 200);
    }
}
