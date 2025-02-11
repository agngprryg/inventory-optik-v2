<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

    protected $table = 'gudang';
    protected $fillable = ['id_manager', 'nama_gudang', 'no_telepon', 'alamat', 'status'];

    public function manager()
    {
        return $this->belongsTo(Manager::class, 'id_manager');
    }
}
