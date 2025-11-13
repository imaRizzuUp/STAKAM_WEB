<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori')->nullable(); // Sesuai desain di frontend
            $table->text('excerpt'); // Ringkasan singkat untuk tampil di landing page
            $table->longText('isi')->nullable(); // Konten lengkap untuk halaman detail nanti
            $table->string('gambar')->nullable(); // Path/URL ke gambar berita
            $table->timestamps(); // Otomatis membuat created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};