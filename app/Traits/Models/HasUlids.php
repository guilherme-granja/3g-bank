<?php

namespace App\Traits\Models;

use Illuminate\Support\Str;

trait HasUlids
{
    public static function bootHasUlids(): void
    {
        static::creating(function ($model) {
            if (empty($model->ulid)) {
                $model->ulid = Str::ulid()->toString();
            }
        });
    }
}
