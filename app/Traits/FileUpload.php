<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileUpload
{

    /**
     * Upload files and images in public directory
     *
     *  @param object $file
     *  @param string $path
     *  @param string $fileName
     */
    protected function handleUploadFile($file, $path, $fileName): void
    {
        $basePath = 'uploads/';

        if (!is_null($file)) {
            $path = $basePath . $path;
            Storage::putFileAs($path, $file, $fileName);
        }
    }
}
