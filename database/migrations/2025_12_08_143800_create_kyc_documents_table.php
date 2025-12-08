<?php

use App\Models\Customer;
use App\Models\KycDocumentType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kyc_documents', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique();
            $table->foreignIdFor(Customer::class)->constrained();
            $table->foreignIdFor(KycDocumentType::class)->constrained();
            $table->string('status');
            $table->text('rejection_reason')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->foreignIdFor(User::class, 'reviewed_by_user_id')
                ->nullable()
                ->constrained();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kyc_documents');
    }
};
