<?php

namespace App\Services;

use App\Models\Page;

class PageService
{
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
