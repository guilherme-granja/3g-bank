<?php

namespace App\Services\Contracts;

use App\Models\KycDocumentType;
use Illuminate\Database\Eloquent\Collection;

interface KycDocumentTypeServiceContract
{
    public function get(string $ulid): ?KycDocumentType;

    public function getAll(): Collection;
}
