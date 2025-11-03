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
        Schema::create('konten_profils', function (Blueprint $table) {
            $table->id();
            // Bagian Deskripsi Utama
            $table->string('judul')->default('Selamat Datang di STAKAM');
            $table->text('paragraf_satu')->nullable();
            $table->text('paragraf_dua')->nullable();
            $table->string('gambar_profil')->nullable();

            // Kartu Keunggulan 1
            $table->string('kartu1_judul')->default('Akreditasi');
            $table->string('kartu1_deskripsi')->default('Terakreditasi BAN-PT');

            // Kartu Keunggulan 2
            $table->string('kartu2_judul')->default('Dosen Kompeten');
            $table->string('kartu2_deskripsi')->default('Praktisi & Akademisi Ahli');

            // Kartu Keunggulan 3
            $table->string('kartu3_judul')->default('Lingkungan Belajar');
            $table->string('kartu3_deskripsi')->default('Kondusif & Spiritual');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konten_profils');
    }
};
