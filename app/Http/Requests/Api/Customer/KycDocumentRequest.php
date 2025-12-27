<?php

namespace App\Http\Requests\Api\Customer;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\File;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Mimes;
use Spatie\LaravelData\Attributes\Validation\MimeTypes;
use Spatie\LaravelData\Attributes\Validation\Ulid;
use Spatie\LaravelData\Data;

class KycDocumentRequest extends Data
{
    public function __construct(
        #[MapOutputName('document_type_ulid'), Ulid]
        public string $documentTypeUlid,
        #[MapOutputName('expires_at')]
        public string $expiresAt,
        #[File, Mimes('pdf'), MimeTypes('application/pdf'), Max(5120)]
        public UploadedFile $file,
    ) {}
}
