<?php

namespace App\Models;

use App\Traits\Models\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $ulid
 * @property int $transaction_id
 * @property string $reason
 * @property float $risk_score
 * @property string $status
 * @property Carbon $created_at
 * @property-read Transaction $transaction
 */
class AmlAlert extends Model
{
    use HasUlids;

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
}
