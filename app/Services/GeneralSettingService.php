<?php

namespace App\Services;

use App\Actions\ManageFileUpload;
use App\Models\GeneralSetting;

class GeneralSettingService
{
    const PATH = 'general-settings';

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
        $rawAttribute = $this->get($id);
        return $rawAttribute->getAttributes()[$attribute];
    }

    /**
     * Store or update record in database.
     */
    public function updateOrStore(string $id, array $generalSetting): GeneralSetting
    {
        $logoName = $faviconName = null;
        if (isset($generalSetting['logo']) && !is_null($generalSetting['logo'])) {
            $logoName = ManageFileUpload::handle($generalSetting['logo'], self::PATH, 'logo');
        } else {
            $logoName = $this->getColumnValue($id, 'logo');
        }

        if (isset($generalSetting['favicon']) && !is_null($generalSetting['favicon'])) {
            $faviconName = ManageFileUpload::handle($generalSetting['favicon'], self::PATH, 'favicon');
        } else {
            $faviconName = $this->getColumnValue($id, 'favicon');
        }

        // replace logo & favicon value with custom names
        $generalSetting = array_replace($generalSetting, array('logo' => $logoName, 'favicon' => $faviconName));

        return GeneralSetting::updateOrCreate(
            ['id' => $id],
            $generalSetting
        );
    }
}
