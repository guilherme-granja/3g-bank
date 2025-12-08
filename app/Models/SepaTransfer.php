<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $ulid
 * @property int $transaction_id
 * @property string $source_iban
 * @property string $target_iban
 * @property string $target_name
 * @property string $target_bank_bic
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $processed_at
 * @property-read Transaction $transaction
 */
class SepaTransfer extends Model
{
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
}
