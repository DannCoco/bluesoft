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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->foreignId('account_id')->references('id')->on('accounts');
            $table->foreignId('transaction_type_id')->references('id')->on('transaction_types');
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->foreignId('status_id')->references('id')->on('status');
            $table->index(['account_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
