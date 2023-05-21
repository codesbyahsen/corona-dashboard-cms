<?php

namespace App\Http\Controllers\Admin\SystemSettings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialLink\StoreRequest;
use App\Http\Requests\SocialLink\UpdateRequest;
use App\Services\SocialLinkService;

class SocialLinkController extends Controller
{
    public function __construct(private SocialLinkService $socialLinkService)
    {
        $this->socialLinkService = $socialLinkService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialLinks = $this->socialLinkService->getAll();
        return view('admin.modules.system-settings.social.index', compact('socialLinks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $result = $this->socialLinkService->create($request->validated());
        if (!$result) {
            return back()->with('error', 'Failed to create social link, try again.');
        }
        return redirect()->route('admin.social_links')->with('success', 'The social link created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $result = $this->socialLinkService->update($id, $request->validated());
        if (!$result) {
            return back()->with('error', 'Failed to update social link, try again.');
        }
        return redirect()->route('admin.social_links')->with('success', 'The social link updated successfully.');
    }

    /**
     * Update the specified status in storage
     */
    public function updateStatus(Request $request, $id)
    {
        $result = $this->socialLinkService->updateStatus($id, $request->status);

        if (!$result) {
            return back()->with('error', 'Failed to update social link status, try again!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->socialLinkService->destroy($id);
        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'The social link deleted successfully.'], 200);
    }
}
