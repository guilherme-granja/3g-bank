<?php

namespace App\Models;

use App\Traits\Models\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $ulid
 * @property int $original_transaction_id
 * @property int $reversal_transaction_id
 * @property string $reason
 * @property Carbon $created_at
 * @property-read Transaction $originalTransaction
 * @property-read Transaction $reversalTransaction
 */
class PaymentReversal extends Model
{
    use HasUlids;

    public function originalTransaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function reversalTransaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
}
