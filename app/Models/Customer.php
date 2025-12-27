<?php

namespace App\Models;

use App\States\Customers\CustomerState;
use App\Traits\Models\HasUlids;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\ModelStates\HasStates;

/**
 * @property int $id
 * @property string $ulid
 * @property string $nif
 * @property CustomerState $status
 * @property string $full_name
 * @property string $date_of_birth
 * @property string $nationality
 * @property string $phone_number
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property Carbon|null $two_factor_confirmed_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Account> $accounts
 * @property-read int|null $accounts_count
 * @property-read CustomerAddress|null $customerAddress
 * @property-read Collection<int, KycDocument> $kycDocuments
 */
class Customer extends Authenticatable
{
    use HasApiTokens, HasStates, HasUlids, MustVerifyEmail, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = [
        'nif',
        'full_name',
        'email',
        'password',
        'status',
        'date_of_birth',
        'nationality',
        'phone_number',
    ];

    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    protected $casts = [
        'password' => 'hashed',
        'two_factor_confirmed_at' => 'datetime',
        'status' => CustomerState::class,
    ];

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

    public function customerAddress(): HasOne
    {
        return $this->hasOne(CustomerAddress::class);
    }

    public function kycDocuments(): HasMany
    {
        return $this->hasMany(KycDocument::class);
    }
}
