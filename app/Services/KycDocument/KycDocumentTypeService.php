<?php

namespace App\Services\KycDocument;

use App\Models\KycDocumentType;
use App\Services\Contracts\KycDocumentTypeServiceContract;
use Illuminate\Database\Eloquent\Collection;

class KycDocumentTypeService implements KycDocumentTypeServiceContract
{
    public function get(string $ulid): ?KycDocumentType
    {
        return KycDocumentType::query()
            ->where('ulid', $ulid)
            ->first();
    }

    public function getAll(): Collection
    {
        return KycDocumentType::query()->get();
    }
}
