<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kyc_document_types', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique();
            $table->string('code')->unique();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kcy_document_types');
    }
};
