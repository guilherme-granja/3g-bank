<?php

namespace App\Http\Controllers\Api\Customer;

use App\Actions\Api\Customer\CreateCustomerAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Customer\CreateCustomerRequest;
use Symfony\Component\HttpFoundation\Response;

class CreateCustomerController extends Controller
{
    public function __invoke(CreateCustomerRequest $request)
    {
        $response = resolve(CreateCustomerAction::class)($request);

        return response()->json(data: $response, status: Response::HTTP_CREATED);
    }
}
