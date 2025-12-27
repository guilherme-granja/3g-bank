<?php

namespace App\States\KycDocuments;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class KycDocumentState extends State
{
    abstract public function labelColor(): string;

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(PendingValidation::class);
    }
}
