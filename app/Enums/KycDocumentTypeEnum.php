<?php

namespace App\Enums;

enum KycDocumentTypeEnum: string
{
    case CC = 'CC';
    case PP = 'PP';
    case AR = 'AR';
    case CM = 'CM';

    public function label(): string
    {
        return match ($this) {
            self::CC => __('document/types.label.cc'),
            self::PP => __('document/types.label.pp'),
            self::AR => __('document/types.label.ar'),
            self::CM => __('document/types.label.cm'),
        };
    }
}
