<?php

namespace App\Services\CustomerAddress;

use App\Http\Requests\Api\Customer\CustomerAddressRequest;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Services\Contracts\CustomerAddressServiceContract;

class CustomerAddressService implements CustomerAddressServiceContract
{
    public function createCustomerAddress(CustomerAddressRequest $data, Customer $customer): CustomerAddress
    {
        return $customer->customerAddress()
            ->create($data->toArray())
            ->refresh();
    }
}
