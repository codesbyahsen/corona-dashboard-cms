<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialLinkRequest;
use App\Services\SocialLinkService;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function __construct(private SocialLinkService $socialLinkService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialLinks = $this->socialLinkService->getAll();
        return  $this->socialLinkService
            ->getAllWithDatatable()
            ->render('admin.modules.settings.social.index', ['socialLinks' => $socialLinks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocialLinkRequest $request)
    {
        $result = $this->socialLinkService->create($request->validated());
        if (!$result) {
            return back()->with('error', 'Failed to create social link, try again.');
        }
        return redirect()->route('admin.social-links.index')->with('success', 'The social link created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialLinkRequest $request, $id)
    {
        $result = $this->socialLinkService->update($id, $request->validated());
        if (!$result) {
            return back()->with('error', 'Failed to update social link, try again.');
        }
        return redirect()->route('admin.social-links.index')->with('success', 'The social link updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = $this->socialLinkService->destroy($id);
        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'The social link deleted successfully.'], 200);
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
}
