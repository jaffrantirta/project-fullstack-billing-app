<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_method_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('payment_type', ['emoney', 'bank_transfer', 'cstore', 'debit_card']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_method_categories');
    }
};
