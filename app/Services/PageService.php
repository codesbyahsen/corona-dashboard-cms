<?php

namespace App\Services;

use App\DataTables\PageDataTable;
use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PageService
 * @package App\Services
 */
class PageService
{
    /**
     * Get all record from database.
     */
    public function getAll(): Collection
    {
        return Page::all();
    }

    /**
     * Get all record from database with
     * datatable.
     */
    public function getAllWithDatatable(): PageDataTable
    {
        return (new PageDataTable);
    }

    /**
     * Get record by id from database.
     */
    public function get(string $id): Page
    {
        return Page::findOrFail($id);
    }

    /**
     * Store new record in database.
     */
    public function create(array $page): void
    {
        Page::create($page);
    }

    /**
     * Update record by id in database.
     */
    public function update(string $id, array $page): void
    {
        $this->get($id)->update($page);
    }

    /**
     * Update status by id in database.
     */
    public function updateStatus(string $id, $status): void
    {
        Page::withoutTimestamps(function () use ($id, $status) {
            $this->get($id)->update(['is_active' => $status]);
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
