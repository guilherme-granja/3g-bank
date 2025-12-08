<?php

use App\Models\KycDocument;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kyc_document_files', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(KycDocument::class)->constrained();
            $table->ulid('object_key')->unique();
            $table->string('bucket_name');
            $table->string('original_filename');
            $table->string('mime_type');
            $table->float('file_size');
            $table->string('checksum_sha256');
            $table->integer('version');
            $table->timestamp('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kyc_document_files');
    }
};
