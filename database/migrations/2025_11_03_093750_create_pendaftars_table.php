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
    Schema::create('pendaftars', function (Blueprint $table) {
        $table->id();

       
        $table->string('program');
        $table->string('program_studi');

       
        $table->string('nama_mahasiswa');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->string('jenis_kelamin');
        $table->string('agama');
        $table->string('nik_ktp')->unique();
        $table->text('alamat')->nullable();
        $table->string('kode_pos')->nullable();
        $table->string('jenis_tinggal')->nullable();
        $table->string('telepon')->nullable();
        $table->string('hp');
        $table->string('email')->unique();
        $table->string('asal_gereja')->nullable();
        $table->string('tahun_lulus')->nullable();

      
        $table->string('nama_ibu');
        $table->string('pekerjaan_ibu')->nullable();
        $table->string('nama_ayah');
        $table->string('pekerjaan_ayah')->nullable();

       
        $table->string('nama_sekolah_sd')->nullable();
        $table->string('tahun_lulus_sd')->nullable();
        $table->string('nama_sekolah_smp')->nullable();
        $table->string('tahun_lulus_smp')->nullable();
        $table->string('nama_sekolah_sma')->nullable();
        $table->string('tahun_lulus_sma')->nullable();

       
        $table->string('file_ijazah')->nullable();
        $table->string('file_ktp')->nullable();
        $table->string('file_kk')->nullable();
        $table->string('file_pas_foto')->nullable();
        $table->string('file_khs')->nullable();

      
        $table->string('status')->default('Menunggu Verifikasi'); // Default status
        
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
