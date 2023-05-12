<?php

namespace App\Services;

use App\Models\MailConfiguration;
use Illuminate\Database\Eloquent\Collection;

class MailConfigurationService
{
    /**
     * Get all record from database.
     */
    public function getAllMailConfigurations(): Collection
    {
        return MailConfiguration::all();
    }

    /**
     * Get record by id from database.
     */
    public function getMailConfiguration(string $id): MailConfiguration
    {
        return MailConfiguration::find($id);
    }

    /**
     * Store new record in database.
     */
    public function createMailConfiguration(array $mailConfigurations): MailConfiguration
    {
        return MailConfiguration::create($mailConfigurations);
    }

    /**
     * Update record by id in database.
     */
    public function updateMailConfiguration(string $id, array $mailConfigurations): bool
    {
        return MailConfiguration::find($id)->update($mailConfigurations);
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
    public function updateMailConfigurationStatus(string $id, $status): bool
    {
        $this->updateAllStatus();
        return MailConfiguration::whereId($id)->update(['is_active' => $status]);
    }

    /**
     * Delete record by id from database.
     */
    public function destroyMailConfiguration(string $id): bool
    {
        return MailConfiguration::find($id)->delete();
    }
}
