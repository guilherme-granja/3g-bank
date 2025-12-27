<?php

namespace App\Http\Requests\Api\Customer;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class CustomerAddressRequest extends Data
{
    public function __construct(
        #[MapOutputName('address_line_1')]
        public string $addressLine1,
        #[MapOutputName('address_line_2')]
        public ?string $addressLine2,
        public string $city,
        #[MapOutputName('postal_code')]
        public string $postalCode,
        public string $country,
    ) {}
}
