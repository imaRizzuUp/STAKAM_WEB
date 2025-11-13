<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Izinkan semua kolom diisi kecuali 'id'
    protected $guarded = ['id'];
}