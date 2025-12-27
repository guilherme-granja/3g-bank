<?php

namespace App\Http\Requests\Api\Customer;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class CustomerInformationRequest extends Data
{
    public function __construct(
        public string $nif,
        #[MapOutputName('full_name')]
        public string $fullName,
        #[MapOutputName('date_of_birth')]
        public string $dateOfBirth,
        public string $nationality,
        #[MapOutputName('phone_number')]
        public string $phoneNumber,
        public string $email,
        public string $password,
    ) {}
}
