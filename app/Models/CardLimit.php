<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $card_id
 * @property string|null $daily_limit
 * @property string $monthly_limit
 * @property string|null $per_transaction_limit
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Card $card
 */
class CardLimit extends Model
{
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
