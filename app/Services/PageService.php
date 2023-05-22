<?php

namespace App\Services;

use App\Models\Page;

class PageService
{
    /**
     * Get record by type from database.
     */
    public function get(string $pageType): Page|null
    {
        return Page::whereType($pageType)->first();
    }

    /**
     * Store or update record in database.
     */
    public function updateOrStore(string $pageType, array $pageDetails): Page
    {
        return Page::updateOrCreate(
            ['type' => $pageType],
            $pageDetails
        );
    }
}
