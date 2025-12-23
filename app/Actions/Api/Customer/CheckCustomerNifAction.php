<?php

namespace App\Actions\Api\Customer;

use App\Data\Customer\CheckNifData;
use App\Http\Requests\Api\Customer\CheckNifRequest;
use App\Services\Contracts\CustomerServiceContract;

class CheckCustomerNifAction
{
    public function __construct(protected CustomerServiceContract $service) {}

    public function __invoke(CheckNifRequest $data): CheckNifData
    {
        return CheckNifData::from([
            'nif' => $data->nif,
            'exists' => $this->service->nifExists($data),
        ]);
    }
}
