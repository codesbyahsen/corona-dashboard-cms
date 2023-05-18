<?php

namespace App\Actions;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ManageFileUpload
{
    /**
     * Upload files and images in public directory
     */
    public static function handle(object $file, string $path, string|null $prefix = null): string
    {
        $basePath = 'uploads/';

        $fileName = null;
        if (File::isFile($file) && !is_null($file)) {
            $fileName = $prefix ? ($prefix . '_' . uniqid() . '_' . time() . '.' . $file->extension()) : (uniqid() . '_' . time() . '.' . $file->extension());

            $path = $basePath . $path;
            Storage::putFileAs($path, $file, $fileName);
        }

        return $fileName;
    }
}
