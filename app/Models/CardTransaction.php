<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $ulid
 * @property int $card_id
 * @property int $account_id
 * @property string $amount
 * @property string $merchant_name
 * @property string $mcc
 * @property string $status
 * @property Carbon $created_at
 * @property string $settled_at
 * @property-read Account $account
 * @property-read Card $card
 */
class CardTransaction extends Model
{
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
