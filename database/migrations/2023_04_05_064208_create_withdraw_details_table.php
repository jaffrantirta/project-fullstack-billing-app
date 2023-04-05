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
        Schema::create('withdraw_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('withdraw_id')->unsigned();
            $table->bigInteger('transaction_id')->unsigned();
            $table->timestamps();
            $table->foreign('withdraw_id')->references('id')->on('withdraws')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraw_details');
    }
};
