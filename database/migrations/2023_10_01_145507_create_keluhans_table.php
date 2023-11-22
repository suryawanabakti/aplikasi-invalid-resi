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
        Schema::create('keluhan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengiriman_id');
            $table->foreign('pengiriman_id')->references('id')->on('pengiriman')->cascadeOnDelete();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->text('keluhan');
            $table->enum('approve', ['proses', 'terima'])->default('proses');
            $table->enum('status_masalah', ['belum selesai', 'selesai'])->default('belum selesai');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluhans');
    }
};
