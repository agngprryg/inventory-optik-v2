<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];

    // Relasi Many to Many dengan Variasi
    public function variasi()
    {
        return $this->belongsToMany(Variasi::class, 'kategori_variasi');
    }
}
