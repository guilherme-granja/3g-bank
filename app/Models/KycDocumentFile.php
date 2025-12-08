<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $kyc_document_id
 * @property string $object_key
 * @property string $bucket_name
 * @property string $original_filename
 * @property string $mime_type
 * @property float $file_size
 * @property string $checksum_sha256
 * @property int $version
 * @property Carbon $created_at
 * @property-read KycDocument $kycDocument
 */
class KycDocumentFile extends Model
{
    public function kycDocument(): BelongsTo
    {
        return $this->belongsTo(KycDocument::class);
    }
}
