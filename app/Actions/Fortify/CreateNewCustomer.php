<?php

namespace App\Actions\Fortify;

use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewCustomer implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {
        Validator::make($input, [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(Customer::class),
            ],
            'password' => $this->passwordRules(),
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric',
            'nationality' => 'required|string',
        ])->validate();

        return Customer::create([
            'full_name' => $input['full_name'],
            'email' => $input['email'],
            'password' => $input['password'],
            'date_of_birth' => $input['date_of_birth'],
            'phone_number' => $input['phone_number'],
            'nationality' => $input['nationality'],
        ]);
    }
}
