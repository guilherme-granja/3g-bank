<?php

namespace App\Services\Customer;

use App\Http\Requests\Api\Customer\CheckNifRequest;
use App\Models\Customer;
use App\Services\Contracts\CustomerServiceContract;

class CustomerServiceService implements CustomerServiceContract
{
    public function nifExists(CheckNifRequest $data): bool
    {
        return Customer::query()
            ->where('nif', $data->nif)
            ->exists();
    }
}
