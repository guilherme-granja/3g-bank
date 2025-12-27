<?php

namespace App\Services\Customer;

use App\Http\Requests\Api\Customer\CheckNifRequest;
use App\Http\Requests\Api\Customer\CustomerInformationRequest;
use App\Models\Customer;
use App\Services\Contracts\CustomerServiceContract;

class CustomerService implements CustomerServiceContract
{
    public function nifExists(CheckNifRequest $data): bool
    {
        return Customer::query()
            ->where('nif', $data->nif)
            ->exists();
    }

    public function createCustomer(CustomerInformationRequest $data): Customer
    {
        return Customer::query()
            ->create($data->toArray())
            ->refresh();
    }
}
