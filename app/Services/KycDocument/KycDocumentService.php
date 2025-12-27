<?php

namespace App\Services\KycDocument;

use App\Http\Requests\Api\Customer\KycDocumentRequest;
use App\Models\Customer;
use App\Models\KycDocument;
use App\Services\Contracts\KycDocumentServiceContract;
use App\Services\Contracts\KycDocumentTypeServiceContract;

class KycDocumentService implements KycDocumentServiceContract
{
    public function __construct(protected KycDocumentTypeServiceContract $kycDocumentTypeService) {}

    public function createKycDocument(KycDocumentRequest $data, Customer $customer): KycDocument
    {
        $kycDocumentType = $this->kycDocumentTypeService->get($data->documentTypeUlid);

        // TODO - put exception here

        return $customer->kycDocuments()->create([
            'kyc_document_type_id' => $kycDocumentType->id,
            'expires_at' => $data->expiresAt
        ])->refresh();
    }
}
