<?php

namespace App\Services;

use App\Models\FaqCategory;
use Illuminate\Database\Eloquent\Collection;

class FaqCategoryService
{
/**
     * Get all record from database.
     */
    public function getAllFaqCategories(): Collection
    {
        return FaqCategory::all();
    }

    /**
     * Get record by id from database.
     */
    public function getFaqCategory(string $id): FaqCategory
    {
        return FaqCategory::find($id);
    }

    /**
     * Store new record in database.
     */
    public function createFaqCategory(array $faqCategory): FaqCategory
    {
        return FaqCategory::create($faqCategory);
    }

    /**
     * Update record by id in database.
     */
    public function updateFaqCategory(string $id, array $faqCategory): bool
    {
        return FaqCategory::find($id)->update($faqCategory);
    }

    /**
     * Delete record by id from database.
     */
    public function destroyFaqCategory(string $id): bool
    {
        return FaqCategory::find($id)->delete();
    }
}
