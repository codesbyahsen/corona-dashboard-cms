<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialLinkRequest;
use App\Services\SocialLinkService;
use App\Traits\AjaxResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SocialLinkController extends Controller
{
    use AjaxResponse;

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
        try {
            $response = $this->socialLinkService->create($request->validated());
            return $this->success('The social link created successfully.', $response, Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $response = $this->socialLinkService->get($id);
            return $this->success('The social link fetched successfully.', $response);
        } catch (ModelNotFoundException $exception) {
            return $this->error('Unable to find this Social Link.', Response::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialLinkRequest $request, $id)
    {
        try {
            $this->socialLinkService->update($id, $request->validated());
            return $this->success('The social link updated successfully.', Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $exception) {
            return $this->error('Unable to find this Social Link.', Response::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }

    /**
     * Update the specified status in storage
     */
    public function updateStatus(Request $request, $id)
    {
        try {
            $this->socialLinkService->updateStatus($id, $request->status);
            return $this->success('The social link status updated successfully.', Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $exception) {
            return $this->error('Unable to find this Social Link.', Response::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->socialLinkService->destroy($id);
            return $this->success('The social link deleted successfully.', Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $exception) {
            return $this->error('Unable to find this Social Link.', Response::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }
}
