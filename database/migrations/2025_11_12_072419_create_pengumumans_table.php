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
        Schema::create('pengumumans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi'); // Untuk excerpt/ringkasan
            $table->longText('isi')->nullable(); // Untuk konten teks tambahan
            $table->string('file_path'); // Path ke file (PDF atau Gambar)
            $table->string('file_type', 10); // Menyimpan 'pdf' atau 'image'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumumans');
    }
};