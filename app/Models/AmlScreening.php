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
 * @property int $result
 * @property string $match_details
 * @property Carbon $created_at
 * @property-read Customer $customer
 */
class AmlScreening extends Model
{
    use HasUlids;

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
