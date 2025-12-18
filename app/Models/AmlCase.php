<?php

namespace App\Models;

use App\Traits\Models\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $ulid
 * @property int $customer_id
 * @property int $alert_id
 * @property string $status
 * @property Carbon $created_at
 * @property string $closed_at
 * @property-read AmlAlert|null $amlAlert
 * @property-read Customer $customer
 */
class AmlCase extends Model
{
    use HasUlids;

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function amlAlert(): BelongsTo
    {
        return $this->belongsTo(AmlAlert::class);
    }
}
