<?php

namespace App\Services;

use App\Models\SocialLink;
use App\DataTables\SocialLinkDataTable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class SocialLinkService
{
    /**
     * Get all record from database.
     */
    public function getAll(): Collection
    {
        return SocialLink::all();
    }

    /**
     * Get all record from database with
     * datatable.
     */
    public function getAllWithDatatable(): SocialLinkDataTable
    {
        return (new SocialLinkDataTable);
    }

    /**
     * Get record by id from database.
     */
    public function get(string $id)
    {
        try {
            return SocialLink::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->with('error', 'Unable to find this Social Link');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Store new record in database.
     */
    public function create(array $socialLink): SocialLink
    {
        return SocialLink::create($socialLink);
    }

    /**
     * Update record by id in database.
     */
    public function update(string $id, array $socialLink)
    {
        try {
            SocialLink::findOrFail($id)->update($socialLink);
        } catch (ModelNotFoundException $exception) {
            return back()->with('error', 'Unable to find this Social Link');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Update status by id in database.
     */
    public function updateStatus(string $id, $status)
    {
        try {
            $socialLink = SocialLink::findOrFail($id);
            SocialLink::withoutTimestamps(function () use ($socialLink, $status) {
                $socialLink->update(['active' => $status]);
            });
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Unable to find this Social Link'], HttpFoundationResponse::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], HttpFoundationResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Delete record by id from database.
     */
    public function destroy(string $id)
    {
        try {
            $socialLink = SocialLink::findOrFail($id);
            $socialLink->delete();
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Unable to find this Social Link'], HttpFoundationResponse::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], HttpFoundationResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
