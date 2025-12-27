<?php

namespace App\Services\FileStorage;

use App\Services\Contracts\FileStorageServiceContract;
use Illuminate\Http\UploadedFile;

class FileStorageService implements FileStorageServiceContract
{
    public function store(UploadedFile $file, string $path, string $fileName): void
    {
        // TODO: Implement store() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
