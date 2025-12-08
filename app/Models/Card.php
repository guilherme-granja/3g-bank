<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $ulid
 * @property int $account_id
 * @property int $type
 * @property string $pan_hash
 * @property string $last4
 * @property string $brand
 * @property string $expiry_month
 * @property string $expiry_year
 * @property string $status
 * @property Carbon $created_at
 * @property string $activated_at
 * @property-read Account $account
 * @property-read CardLimit|null $cardLimit
 * @property-read Collection<int, CardTransaction> $cardTransactions
 */
class Card extends Model
{
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function cardTransactions(): HasMany
    {
        return $this->hasMany(CardTransaction::class);
    }

    public function cardLimit(): HasOne
    {
        return $this->hasOne(CardLimit::class);
    }
}
