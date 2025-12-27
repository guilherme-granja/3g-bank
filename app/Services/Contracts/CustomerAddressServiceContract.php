<?php

namespace App\Services\Contracts;

use App\Http\Requests\Api\Customer\CustomerAddressRequest;
use App\Models\Customer;
use App\Models\CustomerAddress;

interface CustomerAddressServiceContract
{
    public function createCustomerAddress(CustomerAddressRequest $data, Customer $customer): CustomerAddress;
}
