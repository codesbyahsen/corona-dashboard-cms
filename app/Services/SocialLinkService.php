<?php

namespace App\Services;

use App\Models\SocialLink;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
     * Get record by id from database.
     */
    public function get(string $id): SocialLink
    {
        try {
            return SocialLink::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return $exception->getMessage();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Store new record in database.
     */
    public function create(array $socialLink): SocialLink
    {
        return SocialLink::create($socialLink);
    }

    /**
     * Update record by id in database.
     */
    public function update(string $id, array $socialLink): bool
    {
        return $this->get($id)->update($socialLink);
    }

    /**
     * Update status by id in database.
     */
    public function updateStatus(string $id, $status): bool
    {
        return (bool) SocialLink::withoutTimestamps(function () use ($id, $status) {
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
