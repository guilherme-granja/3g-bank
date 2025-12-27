<?php

namespace App\States\Customers;

class AwaitingValidation extends CustomerState
{
    public function labelColor(): string
    {
        return 'yellow';
    }
}
