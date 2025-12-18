<?php

namespace App\Models;

use App\Traits\Models\HasUlids;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $ulid
 * @property string $code
 * @property string|null $description
 * @property bool $required
 * @property-read Collection<int, \App\Models\KycDocument> $KycDocuments
 */
class KycDocumentType extends Model
{
    use HasUlids;

    public function KycDocuments(): HasMany
    {
        return $this->hasMany(KycDocument::class);
    }
}
