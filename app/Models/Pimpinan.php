<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pimpinan extends Model
{
    use HasFactory;
    protected $table = 'pimpinans';
    protected $fillable = [ 'nama', 'jabatan', 'foto' ];

 
    public function getImageUrlAttribute(): string
    {
       
        if ($this->foto) {
            
            if (Str::startsWith($this->foto, 'pimpinan/')) {
                return Storage::url($this->foto);
            }
          
            return asset($this->foto);
        }

       
        return asset('picture/pimpinan_stakam/default-pimpinan.png');
    }
}