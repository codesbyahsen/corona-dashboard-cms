<?php

namespace App\Services;

use App\Models\GeneralSetting;
use Illuminate\Database\Eloquent\Collection;

class GeneralSetupService
{
    /**
     * Get all record from database.
     */
    public function getAll(): Collection
    {
        return GeneralSetting::all();
    }

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
    public function updateOrStore(string $id = '1', array $generalSetting): GeneralSetting
    {
        return GeneralSetting::updateOrCreate(
            ['id' => $id],
            $generalSetting
        );
    }
}
