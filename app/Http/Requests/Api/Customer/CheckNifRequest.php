<?php

namespace App\Http\Requests\Api\Customer;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class CheckNifRequest extends Data
{
    public function __construct(
        #[Min(9), Max(9)]
        public string $nif,
    ) {}
}
