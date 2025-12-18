<?php

use App\Models\Account;
use App\Models\TransactionType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique();
            $table->foreignIdFor(Account::class)->constrained();
            $table->foreignIdFor(TransactionType::class)->constrained();
            $table->decimal(column: 'amount', total: 15);
            $table->integer('direction');
            $table->string('description')->nullable();
            $table->string('reference');
            $table->string('status');
            $table->timestamp('created_at');
            $table->timestamp('completed_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
