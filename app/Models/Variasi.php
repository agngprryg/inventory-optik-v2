<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variasi extends Model
{
    use HasFactory;
    protected $table = 'variasi';
    protected $fillable = ['kategori_id', 'nama_variasi', 'tipe', 'opsi'];

    protected $casts = [
        'opsi' => 'array',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
