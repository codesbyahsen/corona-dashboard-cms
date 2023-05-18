<?php

namespace App\Services;

use App\Models\MailConfiguration;
use Illuminate\Database\Eloquent\Collection;

class MailConfigurationService
{
    /**
     * Get all record from database.
     */
    public function getAll(): Collection
    {
        return MailConfiguration::all();
    }

    /**
     * Get record by id from database.
     */
    public function get(string $id): MailConfiguration
    {
        return MailConfiguration::find($id);
    }

    /**
     * Store new record in database.
     */
    public function create(array $mailConfigurations): MailConfiguration
    {
        return MailConfiguration::create($mailConfigurations);
    }

    /**
     * Update record by id in database.
     */
    public function update(string $id, array $mailConfigurations): bool
    {
        return $this->get($id)->update($mailConfigurations);
    }

    /**
     * Update or disabled all statuses in database.
     */
    private function updateAllStatus(): void
    {
        MailConfiguration::IsActive()->update(['is_active' => MailConfiguration::STATUS_INACTIVE]);
    }

    /**
     * Update status by id in database.
     */
    public function updateStatus(string $id, $status): bool
    {
        $this->updateAllStatus();
        return $this->get($id)->update(['is_active' => $status]);
    }

    /**
     * Delete record by id from database.
     */
    public function destroy(string $id): bool
    {
        return $this->get($id)->delete();
    }
}
