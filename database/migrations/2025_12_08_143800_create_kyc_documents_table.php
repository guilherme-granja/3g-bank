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
            $table->string('status')->index();
            $table->integer('current_version')->default(1);
            $table->text('rejection_reason')->nullable();
            $table->timestamp('expires_at')->nullable()->index();
            $table->foreignIdFor(User::class, 'reviewed_by_user_id')
                ->nullable()
                ->constrained();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('created_at');

            $table->unique(['customer_id', 'kyc_document_type_id', 'status', 'current_version']);
            $table->index(['status', 'created_at']);
            $table->index(['reviewed_by_user_id', 'reviewed_at']);
            $table->index(['customer_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kyc_documents');
    }
};
