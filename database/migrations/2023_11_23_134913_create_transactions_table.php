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
            $table->timestamps();
            $table->integer('lama_sewa')->unsigned();
            $table->string('tanggal_mulai_sewa');
            $table->integer('harga_total')->unsigned();
            $table->boolean('isReview');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');;
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
