<?php

namespace App\Services;

use App\Models\SocialLink;
use App\DataTables\SocialLinkDataTable;
use Illuminate\Database\Eloquent\Collection;

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
    public function get(string $id): SocialLink
    {
        return SocialLink::findOrFail($id);
    }

    /**
     * Store new record in database.
     */
    public function create(array $socialLink): void
    {
        SocialLink::create($socialLink);
    }

    /**
     * Update record by id in database.
     */
    public function update(string $id, array $socialLink): void
    {
        $this->get($id)->update($socialLink);
    }

    /**
     * Update status by id in database.
     */
    public function updateStatus(string $id, $status): void
    {
        SocialLink::withoutTimestamps(function () use ($id, $status) {
            $this->get($id)->update(['active' => $status]);
        });
    }

    /**
     * Delete record by id from database.
     */
    public function destroy(string $id): void
    {
        $this->get($id)->delete();
    }
}
