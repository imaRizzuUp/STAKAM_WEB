<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenHero extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model.
     *
     * @var string
     */
    protected $table = 'konten_heroes';

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * Atribut ini penting untuk keamanan saat menggunakan metode seperti create() atau update().
     * Hanya atribut yang terdaftar di sini yang bisa diisi melalui form.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul_utama',
        'deskripsi',
        'gambar_utama',
        'gambar_latar',
    ];
}