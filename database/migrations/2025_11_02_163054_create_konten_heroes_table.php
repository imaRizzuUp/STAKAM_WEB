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
        Schema::create('konten_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('judul_utama')->default('Judul Default');
            $table->text('deskripsi')->nullable();
            $table->string('gambar_utama')->nullable(); // Menyimpan path gambar
            $table->string('gambar_latar')->nullable(); // Menyimpan path gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konten_heroes');
    }
};
