<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $ulid
 * @property int $account_id
 * @property int $transaction_type_id
 * @property string $amount
 * @property int $direction
 * @property string|null $description
 * @property string $reference
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $completed_at
 * @property-read Account $account
 * @property-read Collection<int, PaymentReversal> $paymentReversals
 * @property-read int|null $payment_reversals_count
 * @property-read Collection<int, SepaTransfer> $sepaTransfers
 * @property-read int|null $sepa_transfers_count
 * @property-read TransactionType $transactionType
 */
class Transaction extends Model
{
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function transactionType(): BelongsTo
    {
        return $this->belongsTo(TransactionType::class);
    }

    public function sepaTransfers(): HasMany
    {
        return $this->hasMany(SepaTransfer::class);
    }

    public function paymentReversals(): HasMany
    {
        return $this->hasMany(PaymentReversal::class);
    }
}
