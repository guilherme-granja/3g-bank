<?php

namespace App\States\Customers;

class AwaitingValidation extends CustomerState
{
    public function color(): string
    {
        return 'yellow';
    }
}
