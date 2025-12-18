<?php

namespace App\States\Customers;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class CustomerState extends State
{
    abstract public function color(): string;

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(AwaitingValidation::class);
    }
}
