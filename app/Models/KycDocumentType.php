<?php

namespace App\Models;

use App\Enums\KycDocumentTypeEnum;
use App\Traits\Models\HasUlids;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $ulid
 * @property KycDocumentTypeEnum $code
 * @property-read Collection<int, KycDocument> $KycDocuments
 */
class KycDocumentType extends Model
{
    use HasUlids;

    public $timestamps = false;

    protected $casts = [
        'code' => KycDocumentTypeEnum::class,
    ];

    public function KycDocuments(): HasMany
    {
        return $this->hasMany(KycDocument::class);
    }
}
