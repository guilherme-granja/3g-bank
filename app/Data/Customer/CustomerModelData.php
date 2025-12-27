<?php

namespace App\Data\Customer;

use App\States\Customers\CustomerState;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class CustomerModelData extends Data
{
    public function __construct(
        public string $uuid,
        public string $nif,
        public CustomerState $status,
        #[MapOutputName('fullName')]
        public string $full_name,
        #[MapOutputName('dateOfBirth')]
        public string $date_of_birth,
        public string $nationality,
        #[MapOutputName('phoneNumber')]
        public string $phone_number,
        public string $email,
        #[MapOutputName('emailVerifiedAt')]
        public string $email_verified_at,
        public string $password,
        #[MapOutputName('twoFactorSecret')]
        public string $two_factor_secret,
        #[MapOutputName('twoFactorRecoveryCodes')]
        public string $two_factor_recovery_codes,
        #[MapOutputName('twoFactorConfirmedAt')]
        public string $two_factor_confirmed_at,
        #[MapOutputName('createdAt')]
        public string $created_at,
        #[MapOutputName('updatedAt')]
        public string $updated_at,
    ) {}
}
