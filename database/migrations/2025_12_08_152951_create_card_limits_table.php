<?php

use App\Models\Card;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('card_limits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Card::class)->constrained();
            $table->decimal(column: 'daily_limit', total:15)->nullable();
            $table->decimal(column: 'monthly_limit', total:15);
            $table->decimal(column: 'per_transaction_limit', total:15)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('card_limits');
    }
};
