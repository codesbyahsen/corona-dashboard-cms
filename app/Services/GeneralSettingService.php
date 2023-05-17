<?php

namespace App\Services;

use App\Models\GeneralSetting;

class GeneralSettingService
{
    /**
     * Get record by id from database.
     */
    public function get(string $id): GeneralSetting
    {
        return GeneralSetting::find($id);
    }

    /**
     * Get the specified record's column value
     */
    public function getColumnValue($id, $attribute): mixed
    {
        return GeneralSetting::whereId($id)->value($attribute);
    }

    /**
     * Store or update record in database.
     */
    public function updateOrStore(string $id, array $generalSetting): GeneralSetting
    {
        return GeneralSetting::updateOrCreate(
            ['id' => $id],
            $generalSetting
        );
    }
}
