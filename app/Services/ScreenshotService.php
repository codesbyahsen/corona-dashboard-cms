<?php

namespace App\Services;

use App\Models\Screenshot;
use Spatie\Browsershot\Browsershot;
use Illuminate\Database\Eloquent\Collection;

class ScreenshotService
{
    /**
     * Get all record from database.
     */
    public function getAll(): Collection
    {
        return Screenshot::all();
    }

    /**
     * Get record by id from database.
     */
    public function get(string $id): Screenshot
    {
        return Screenshot::find($id);
    }

    /**
     * Store new record in database.
     */
    public function create(array $screenshot): Screenshot
    {
        $snapName = null;
        if ($screenshot['url']) {
            $snapName = 'screenshot-' . time() . '.png';
        }

        Browsershot::url($screenshot['url'])
            ->fullPage()
            ->waitUntilNetworkIdle()
            ->save(storage_path() . '/uploads/screenshots/' . $snapName);

        return Screenshot::create([
            'snap' => $snapName,
        ]);
    }

    /**
     * Delete record by id from database.
     */
    public function destroy(string $id): bool
    {
        return $this->get($id)->delete();
    }
}
