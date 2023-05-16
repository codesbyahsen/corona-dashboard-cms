<?php

namespace App\Services;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Collection;

class FaqService
{
/**
     * Get all record from database.
     */
    public function getAll(): Collection
    {
        return Faq::with('faqCategory')->get();
    }

    /**
     * Get record by id from database.
     */
    public function get(string $id): Faq
    {
        return Faq::with('faqCategory')->find($id);
    }

    /**
     * Store new record in database.
     */
    public function create(array $faq): Faq
    {
        return Faq::create($faq);
    }

    /**
     * Update record by id in database.
     */
    public function update(string $id, array $faq): bool
    {
        return Faq::find($id)->update($faq);
    }

    /**
     * Update status by id in database.
     */
    public function updateStatus(string $id, $status): bool
    {
        return (bool) Faq::withoutTimestamps(function () use ($id, $status) {
            Faq::find($id)->update(['is_active' => $status]);
        });
    }

    /**
     * Delete record by id from database.
     */
    public function destroy(string $id): bool
    {
        return Faq::find($id)->delete();
    }
}
