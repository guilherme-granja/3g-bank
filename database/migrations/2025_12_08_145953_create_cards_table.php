<?php

use App\Models\Account;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique();
            $table->foreignIdFor(Account::class)->constrained();
            $table->integer('type');
            $table->string('pan_hash');
            $table->string('last4');
            $table->string('brand');
            $table->string('expiry_month');
            $table->string('expiry_year');
            $table->string('status');
            $table->timestamp('created_at');
            $table->timestamp('activated_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
