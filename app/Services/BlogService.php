<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;

class BlogService
{
    /**
     * Get all record from database.
     */
    public function getAll(): Collection
    {
        return Blog::all();
    }

    /**
     * Get record by id from database.
     */
    public function get(string $id): Blog
    {
        return Blog::with('blogCategories')->find($id);
    }

    /**
     * Get the specified record's column value
     */
    public function getColumnValue($id, $attribute): mixed
    {
        return Blog::whereId($id)->value($attribute);
    }

    /**
     * Store new record in database.
     */
    public function create(array $blog): Blog
    {
        return Blog::create($blog);
    }

    /**
     * Update record by id in database.
     */
    public function update(string $id, array $blog): bool
    {
        return Blog::find($id)->update($blog);
    }

    /**
     * Update status by id in database.
     */
    public function updateStatus(string $id, $status): bool
    {
        return (bool) Blog::withoutTimestamps(function () use ($id, $status) {
            Blog::find($id)->update(['is_active' => $status]);
        });
    }

    /**
     * Delete record by id from database.
     */
    public function destroy(string $id): bool
    {
        return Blog::find($id)->delete();
    }
}
