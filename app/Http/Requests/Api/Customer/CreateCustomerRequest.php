<?php

namespace App\Http\Requests\Api\Customer;

use Spatie\LaravelData\Data;

class CreateCustomerRequest extends Data
{
    public function __construct(
        public CustomerInformationRequest $customerInformation,
        public CustomerAddressRequest $customerAddress,
        public KycDocumentRequest $customerDocument,
    ) {}
}
