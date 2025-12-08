<?php

use App\Models\Account;
use App\Models\Card;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('card_transactions', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique();
            $table->foreignIdFor(Card::class)->constrained();
            $table->foreignIdFor(Account::class)->constrained();
            $table->decimal(column: 'amount', total: 15);
            $table->string('merchant_name');
            $table->string('mcc');
            $table->string('status');
            $table->timestamp('created_at');
            $table->timestamp('settled_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('card_transactions');
    }
};
