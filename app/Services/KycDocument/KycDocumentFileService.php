<?php

namespace App\Services\KycDocument;

use App\Http\Requests\Api\Customer\KycDocumentRequest;
use App\Models\KycDocument;
use App\Models\KycDocumentFile;
use App\Services\Contracts\FileStorageServiceContract;
use App\Services\Contracts\KycDocumentFileServiceContract;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class KycDocumentFileService implements KycDocumentFileServiceContract
{
    public function __construct(protected FileStorageServiceContract $fileStorageService) {}

    public function createKycDocumentFile(KycDocumentRequest $data, KycDocument $kycDocument): KycDocumentFile
    {
        $objectKey = $this->setObjectKey(kycDocument: $kycDocument, file: $data->file);

        $kycDocumentFile = $kycDocument->kycDocumentFile()->create([
            'version' => $kycDocument->current_version,
            'bucket_name' => config(key: 'filesystems.disks.minio.bucket'),
            'original_filename' => $data->file->getClientOriginalName(),
            'mime_type' => $data->file->getMimeType(),
            'file_size' => $data->file->getSize(),
            'checksum_sha256' => $this->setChecksum(file: $data->file),
            'object_key' => $objectKey,
        ]);

        $this->fileStorageService->store(
            file: $data->file,
            path: dirname($objectKey),
            fileName: basename($objectKey),
        );

        return $kycDocumentFile;
    }

    private function setChecksum(UploadedFile $file): string
    {
        return hash_file(
            algo: 'sha256',
            filename: fopen($file->getRealPath(), 'rb'),
        );
    }

    private function setObjectKey(KycDocument $kycDocument, UploadedFile $file): string
    {
        $kycDocument->loadMissing(['customer', 'kycDocumentType']);

        return sprintf(
            'documents/customer/%s/%s/v%d/%s.%s',
            $kycDocument->customer->ulid,
            str($kycDocument->kycDocumentType->code->value)->lower(),
            $kycDocument->current_version,
            Str::ulid()->toString(),
            $file->getClientOriginalExtension()
        );
    }
}
