<?php

namespace App\Services\Contracts;

use App\Http\Requests\Api\Customer\KycDocumentRequest;
use App\Models\KycDocument;
use App\Models\KycDocumentFile;

interface KycDocumentFileServiceContract
{
    public function createKycDocumentFile(KycDocumentRequest $data, KycDocument $kycDocument): KycDocumentFile;
}
