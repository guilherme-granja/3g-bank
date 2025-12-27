<?php

namespace App\Models;

use App\States\KycDocuments\KycDocumentState;
use App\Traits\Models\HasUlids;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $ulid
 * @property int $customer_id
 * @property int $kyc_document_type_id
 * @property KycDocumentState $status
 * @property int $current_version
 * @property string|null $rejection_reason
 * @property string|null $expires_at
 * @property int|null $reviewed_by_user_id
 * @property string|null $reviewed_at
 * @property Carbon $created_at
 * @property-read Customer $customer
 * @property-read Collection<int, KycDocumentFile> $kycDocumentFile
 * @property-read KycDocumentType $kycDocumentType
 */
class KycDocument extends Model
{
    use HasUlids;

    protected $casts = [
        'status' => KycDocumentState::class,
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function kycDocumentType(): BelongsTo
    {
        return $this->belongsTo(KycDocumentType::class);
    }

    public function kycDocumentFile(): HasMany
    {
        return $this->hasMany(KycDocumentFile::class);
    }
}
