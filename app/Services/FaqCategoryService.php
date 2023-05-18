<?php

namespace App\Services;

use App\Models\FaqCategory;
use Illuminate\Database\Eloquent\Collection;

class FaqCategoryService
{
/**
     * Get all record from database.
     */
    public function getAll(): Collection
    {
        return FaqCategory::all();
    }

    /**
     * Get record by id from database.
     */
    public function get(string $id): FaqCategory
    {
        return FaqCategory::find($id);
    }

    /**
     * Store new record in database.
     */
    public function create(array $faqCategory): FaqCategory
    {
        return FaqCategory::create($faqCategory);
    }

    /**
     * Update record by id in database.
     */
    public function update(string $id, array $faqCategory): bool
    {
        return $this->get($id)->update($faqCategory);
    }

    /**
     * Delete record by id from database.
     */
    public function destroy(string $id): bool
    {
        return $this->get($id)->delete();
    }
}
