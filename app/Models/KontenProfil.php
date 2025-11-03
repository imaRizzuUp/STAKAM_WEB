<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenProfil extends Model
{
    use HasFactory;

    protected $table = 'konten_profils';


    protected $fillable = [
        'judul',
        'paragraf_satu', 
        'paragraf_dua',  
        'gambar_profil',
        'kartu1_judul',
        'kartu1_deskripsi',
        'kartu2_judul',
        'kartu2_deskripsi',
        'kartu3_judul',
        'kartu3_deskripsi',
    ];
}