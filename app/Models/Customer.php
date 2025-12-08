<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * @property int $id
 * @property string $full_name
 * @property string $date_of_birth
 * @property string $nationality
 * @property string $email
 * @property string $phone_number
 * @property string $password
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Account> $accounts
 * @property-read int|null $accounts_count
 * @property-read CustomerAddress|null $customerAddress
 * @property-read Collection<int, KycDocument> $kycDocuments
 */
class Customer extends Authenticatable
{
    use HasApiTokens, Notifiable, TwoFactorAuthenticatable;

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
