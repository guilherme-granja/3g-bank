<?php

namespace App\Services\Contracts;

use App\Models\KycDocument;

interface DocumentFileServiceContract
{
    public function createDocumentFile(KycDocument $kycDocument);
}
