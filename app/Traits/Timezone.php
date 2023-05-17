<?php

namespace App\Traits;

use DateTimeZone;

trait timezone
{
    protected function getTimeZones(): array
    {
        $timezones = array();
        $timezoneIdentifiers = \DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        foreach ($timezoneIdentifiers as $tzIdentifier) {
            date_default_timezone_set($tzIdentifier);
            $timezones[] = '(GMT' . date('P', time()) . ') ' . $tzIdentifier;
        }
        $timezones = array_replace($timezones, array('419' => 'UTC'));
        return $timezones;
    }
}
