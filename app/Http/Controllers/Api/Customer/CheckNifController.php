<?php

namespace App\Http\Controllers\Api\Customer;

use App\Actions\Api\Customer\CheckCustomerNifAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Customer\CheckNifRequest;

class CheckNifController extends Controller
{
    public function __invoke(CheckNifRequest $request)
    {
        $response = resolve(CheckCustomerNifAction::class)($request);

        return response()->json($response);
    }
}
