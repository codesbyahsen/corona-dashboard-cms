<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Traits\AjaxResponse;
use Illuminate\Http\Request;
use App\Services\PageService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PageController extends Controller
{
    use AjaxResponse;

    public function __construct(private PageService $pageService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = $this->pageService->getAll();
        return  $this->pageService
            ->getAllWithDatatable()
            ->render('admin.modules.settings.pages.index', ['pages' => $pages]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        try {
            $response = $this->pageService->create($request->validated());
            return $this->success('The page created successfully.', $response, Response::HTTP_CREATED);
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
            $response = $this->pageService->get($id);
            return $this->success('The page fetched successfully.', $response);
        } catch (ModelNotFoundException $exception) {
            return $this->error('Unable to find this page.', Response::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, $id)
    {
        try {
            $this->pageService->update($id, $request->validated());
            return $this->success('The page updated successfully.', Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $exception) {
            return $this->error('Unable to find this page.', Response::HTTP_NOT_FOUND);
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
            $this->pageService->updateStatus($id, $request->status);
            return $this->success('The page status updated successfully.', Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $exception) {
            return $this->error('Unable to find this page.', Response::HTTP_NOT_FOUND);
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
            $this->pageService->destroy($id);
            return $this->success('The page deleted successfully.', Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $exception) {
            return $this->error('Unable to find this page.', Response::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }
}
