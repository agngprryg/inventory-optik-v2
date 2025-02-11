<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    protected $table = 'cabang';
    protected $fillable = ['id_manager', 'nama_cabang', 'no_telepon', 'alamat', 'status'];


    public function manager()
    {
        return $this->belongsTo(Manager::class, 'id_manager');
    }
}
