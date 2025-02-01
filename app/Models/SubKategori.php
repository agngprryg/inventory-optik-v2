<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    use HasFactory;
    protected $table = 'sub_kategori';
    protected $fillable = ['id_kategori', 'nama_sub_kategori'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function subSubKategori()
    {
        return $this->hasMany(SubSubKategori::class, 'id_sub_kategori');
    }
}
