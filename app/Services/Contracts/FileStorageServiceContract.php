<?php

namespace App\Services\Contracts;

use Illuminate\Http\UploadedFile;

interface FileStorageServiceContract
{
    public function store(UploadedFile $file, string $path, string $fileName): void;

    public function delete();
}
