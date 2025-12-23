<?php

namespace App\Services\Contracts;

use App\Http\Requests\Api\Customer\CheckNifRequest;

interface CustomerServiceContract
{
    public function nifExists(CheckNifRequest $data): bool;
}
