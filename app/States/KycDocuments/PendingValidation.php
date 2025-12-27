<?php

namespace App\States\KycDocuments;

use App\States\KycDocuments\KycDocumentState;

class PendingValidation extends KycDocumentState
{
    public function labelColor(): string
    {
        return 'yellow';
    }
}
