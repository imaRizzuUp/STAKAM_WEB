<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;
    
    protected $table = 'program_studis';

    protected $fillable = [
        'jenjang',
        'nama_prodi',
        'deskripsi',
        'link_detail',
    ];
}