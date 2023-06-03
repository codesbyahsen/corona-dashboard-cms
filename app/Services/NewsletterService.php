<?php

namespace App\Services;

use App\Models\NewsletterSubscriber;
use Illuminate\Database\Eloquent\Collection;

class NewsletterService
{
    /**
     * Get all record from database.
     */
    public function getAll(): Collection
    {
        return NewsletterSubscriber::all();
    }

    /**
     * Get record by id from database.
     */
    public function get(string $id): NewsletterSubscriber
    {
        return NewsletterSubscriber::find($id);
    }

    /**
     * Store new record in database.
     */
    public function create(array $newsletter): NewsletterSubscriber
    {
        return NewsletterSubscriber::create($newsletter);
    }

    /**
     * Update record by id in database.
     */
    public function update(string $id, array $newsletter): bool
    {
        return $this->get($id)->update($newsletter);
    }

    /**
     * Update status by id in database.
     */
    public function updateStatus(string $id, $status): bool
    {
        return (bool) NewsletterSubscriber::withoutTimestamps(function () use ($id, $status) {
            $this->get($id)->update(['is_active' => $status]);
        });
    }

    /**
     * Delete record by id from database.
     */
    public function destroy(string $id): bool
    {
        return $this->get($id)->delete();
    }
}
