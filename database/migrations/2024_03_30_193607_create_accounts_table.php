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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->double('balance');
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->foreignId('account_type_id')->references('id')->on('account_types');
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->foreignId('status_id')->references('id')->on('status');
            $table->index(['number']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
