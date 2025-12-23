<?php

namespace App\Data\Customer;

use Spatie\LaravelData\Data;

class CheckNifData extends Data
{
    public function __construct(
        public string $nif,
        public bool $exists,
    ) {}
}
