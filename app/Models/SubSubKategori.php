<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubKategori extends Model
{
    use HasFactory;
    protected $table = 'sub_sub_kategori';
    protected $fillable = ['id_sub_kategori', 'nama_sub_sub_kategori'];

    public function subKategori()
    {
        return $this->belongsTo(SubKategori::class, 'id_sub_kategori');
    }
}
