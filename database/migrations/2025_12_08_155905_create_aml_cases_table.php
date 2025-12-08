<?php

use App\Models\AmlAlert;
use App\Models\Customer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('aml_cases', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique();
            $table->foreignIdFor(Customer::class)->constrained();
            $table->foreignIdFor(AmlAlert::class, 'alert_id')->constrained('aml_alerts');
            $table->string('status');
            $table->timestamp('created_at');
            $table->timestamp('closed_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aml_cases');
    }
};
