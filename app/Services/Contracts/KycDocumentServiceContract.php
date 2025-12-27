<?php

namespace App\Services\Contracts;

use App\Http\Requests\Api\Customer\KycDocumentRequest;
use App\Models\Customer;
use App\Models\KycDocument;

interface KycDocumentServiceContract
{
    public function createKycDocument(KycDocumentRequest $data, Customer $customer): KycDocument;
}
