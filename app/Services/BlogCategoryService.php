<?php

namespace App\Services;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryService
{
    /**
     * Get all record from database.
     */
    public function getAll(): Collection
    {
        return BlogCategory::all();
    }

    /**
     * Get record by id from database.
     */
    public function get(string $id): BlogCategory
    {
        return BlogCategory::find($id);
    }

    /**
     * Store new record in database.
     */
    public function create(array $blogCategory): BlogCategory
    {
        return BlogCategory::create($blogCategory);
    }

    /**
     * Update record by id in database.
     */
    public function update(string $id, array $blogCategory): bool
    {
        return $this->get($id)->update($blogCategory);
    }

    /**
     * Delete record by id from database.
     */
    public function destroy(string $id): bool
    {
        return $this->get($id)->delete();
    }
}
