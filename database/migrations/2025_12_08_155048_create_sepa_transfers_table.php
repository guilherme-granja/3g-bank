<?php

use App\Models\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sepa_transfers', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique();
            $table->foreignIdFor(Transaction::class)->constrained();
            $table->string('source_iban');
            $table->string('target_iban');
            $table->string('target_name');
            $table->string('target_bank_bic');
            $table->string('status');
            $table->timestamp('created_at');
            $table->timestamp('processed_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sepa_transfers');
    }
};
