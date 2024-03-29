<?php

use Brick\Math\BigInteger;
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
        Schema::create('dues', function (Blueprint $table) {
            $table->id();
            $table->integer('month');
            $table->integer('year');
            $table->double('amount');
            $table->integer('status')->comment('1=pending, 2=paid, 3=cancelled, 4=refunded, 5=failed, 6=overdue')->default(1);
            $table->bigInteger('member_id')->unsigned();
            $table->bigInteger('package_id')->unsigned();
            $table->dateTime('due_date')->nullable();
            $table->dateTime('paid_date')->nullable();
            $table->timestamps();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dues');
    }
};
