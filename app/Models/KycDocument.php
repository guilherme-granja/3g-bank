<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $ulid
 * @property int $customer_id
 * @property int $kyc_document_type_id
 * @property string $status
 * @property string|null $rejection_reason
 * @property string|null $expires_at
 * @property int|null $reviewed_by_user_id
 * @property string|null $reviewed_at
 * @property Carbon $created_at
 * @property-read Customer $customer
 * @property-read KycDocumentFile|null $kycDocumentFile
 * @property-read KycDocumentType $kycDocumentType
 */
class KycDocument extends Model
{
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function kycDocumentType(): BelongsTo
    {
        return $this->belongsTo(KycDocumentType::class);
    }

    public function kycDocumentFile(): HasOne
    {
        return $this->hasOne(KycDocumentFile::class);
    }
}
