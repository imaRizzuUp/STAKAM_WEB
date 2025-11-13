<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    /**
     * [PERBAIKAN]
     * Memberi tahu Laravel nama tabel yang benar secara eksplisit.
     */
    protected $table = 'pengumumans';

    protected $fillable = [
        'judul',
        'deskripsi',
        'isi',
        'file_path',
        'file_type',
    ];
}