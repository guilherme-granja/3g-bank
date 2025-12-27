<?php

namespace App\Services\Contracts;

use App\Http\Requests\Api\Customer\CheckNifRequest;
use App\Http\Requests\Api\Customer\CustomerInformationRequest;
use App\Models\Customer;

interface CustomerServiceContract
{
    public function nifExists(CheckNifRequest $data): bool;

    public function createCustomer(CustomerInformationRequest $data): Customer;
}
