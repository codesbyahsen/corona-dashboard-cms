<?php

namespace App\Services;

use App\Models\EnvironmentSetting;

class EnvironmentSettingService
{
/**
     * Get record by id from database.
     */
    public function get(string $id): EnvironmentSetting|null
    {
        return EnvironmentSetting::find($id);
    }

    /**
     * Get the specified record's column value
     */
    public function getColumnValue($id, $attribute): mixed
    {
        $rawAttribute = $this->get($id);
        return $rawAttribute->getAttributes()[$attribute];
    }

    /**
     * Store or update record in database.
     */
    public function updateOrStore(string $id, array $environmentSetting): EnvironmentSetting
    {
        return EnvironmentSetting::updateOrCreate(
            ['id' => $id],
            $environmentSetting
        );
    }
}
