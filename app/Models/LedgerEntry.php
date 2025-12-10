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
 * @property int $account_id
 * @property int $entry_type
 * @property string $amount
 * @property Carbon $created_at
 * @property-read Account $account
 * @property-read Transaction $transaction
 */
class LedgerEntry extends Model
{
    use HasUlids;

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
