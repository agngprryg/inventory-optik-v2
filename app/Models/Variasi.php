<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variasi extends Model
{
    use HasFactory;

    protected $table = 'variasi';
    protected $fillable = ['nama_variasi', 'tipe', 'opsi'];

    protected $casts = [
        'opsi' => 'array',
    ];

    // Relasi Many to Many dengan Kategori
    public function kategoris()
    {
        return $this->belongsToMany(Kategori::class, 'kategori_variasi');
    }
}
