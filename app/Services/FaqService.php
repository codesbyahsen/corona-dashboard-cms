<?php

namespace App\Services;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Collection;

class FaqService
{
/**
     * Get all record from database.
     */
    public function getAllFaqs(): Collection
    {
        return Faq::with('faqCategory')->get();
    }

    /**
     * Get record by id from database.
     */
    public function getFaq(string $id): Faq
    {
        return Faq::with('faqCategory')->find($id);
    }

    /**
     * Store new record in database.
     */
    public function createFaq(array $faq): Faq
    {
        return Faq::create($faq);
    }

    /**
     * Update record by id in database.
     */
    public function updateFaq(string $id, array $faq): bool
    {
        return Faq::find($id)->update($faq);
    }

    /**
     * Update status by id in database.
     */
    public function updateFaqStatus(string $id, $status): bool
    {
        return (bool) Faq::withoutTimestamps(function () use ($id, $status) {
            Faq::find($id)->update(['is_active' => $status]);
        });
    }

    /**
     * Delete record by id from database.
     */
    public function destroyFaq(string $id): bool
    {
        return Faq::find($id)->delete();
    }
}
