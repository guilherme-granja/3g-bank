<?php

namespace App\Actions\Api\Customer;

use App\Data\Customer\CustomerModelData;
use App\Http\Requests\Api\Customer\CreateCustomerRequest;
use App\Services\Contracts\CustomerAddressServiceContract;
use App\Services\Contracts\CustomerServiceContract;
use App\Services\Contracts\KycDocumentFileServiceContract;
use App\Services\Contracts\KycDocumentServiceContract;
use Illuminate\Support\Facades\DB;

class CreateCustomerAction
{
    public function __construct(
        protected CustomerServiceContract $customerService,
        protected CustomerAddressServiceContract $customerAddressService,
        protected KycDocumentServiceContract $kycDocumentService,
        protected KycDocumentFileServiceContract $kycDocumentFileService,
    ) {}

    public function __invoke(CreateCustomerRequest $data): CustomerModelData
    {
        $customerModel = DB::transaction(function () use ($data) {
            $customer = $this->customerService->createCustomer($data->customerInformation);
            $this->customerAddressService->createCustomerAddress($data->customerAddress, $customer);

            $kycDocument = $this->kycDocumentService->createKycDocument($data->customerDocument, $customer);
            $this->kycDocumentFileService->createKycDocumentFile($data->customerDocument, $kycDocument);

            return $customer;
        });

        return CustomerModelData::from($customerModel->refresh());
    }
}
