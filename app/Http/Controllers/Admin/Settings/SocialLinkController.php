<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialLinkRequest;
use App\Services\SocialLinkService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $response = $this->socialLinkService->create($request->validated());
        if (!$response) {
            return back()->with('error', 'Failed to create social link, try again.');
        }
        return redirect()->route('admin.social-links.index')->with('success', 'The social link created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialLinkRequest $request, $id)
    {
        $response = $this->socialLinkService->update($id, $request->validated());

        if (!$response) {
            return redirect()->route('admin.social-links.index')->with('success', 'The social link updated successfully.');
        }
        return back();
    }

    /**
     * Update the specified status in storage
     */
    public function updateStatus(Request $request, $id)
    {
        $response = $this->socialLinkService->updateStatus($id, $request->status);

        if (!$response) {
            return response()->json(['success' => true, 'message' => 'The social link status updated successfully.'], Response::HTTP_OK);
        }
        return response()->json($response->getData(), $response->getStatusCode());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = $this->socialLinkService->destroy($id);
        if (!$response) {
            return response()->json(['success' => true, 'message' => 'The social link deleted successfully.'], Response::HTTP_OK);
        }
        return response()->json($response->getData(), $response->getStatusCode());
    }
}
