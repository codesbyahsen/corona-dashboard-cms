<?php

namespace App\Services;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryService
{
    /**
     * Get all record from database.
     */
    public function getAllBlogCategories(): Collection
    {
        return BlogCategory::all();
    }

    /**
     * Get record by id from database.
     */
    public function getBlogCategory(string $id): BlogCategory
    {
        return BlogCategory::find($id);
    }

    /**
     * Store new record in database.
     */
    public function createBlogCategory(array $blogCategory): BlogCategory
    {
        return BlogCategory::create($blogCategory);
    }

    /**
     * Update record by id in database.
     */
    public function updateBlogCategory(string $id, array $blogCategory): bool
    {
        return BlogCategory::find($id)->update($blogCategory);
    }

    /**
     * Delete record by id from database.
     */
    public function destroyBlogCategory(string $id): bool
    {
        return BlogCategory::find($id)->delete();
    }
}
