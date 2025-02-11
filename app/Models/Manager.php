<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    protected $table = 'manager';
    protected $fillable = ['nama_manager', 'foto', 'no_telepon', 'email', 'alamat'];

    public function gudang()
    {
        return $this->hasMany(Gudang::class);
    }

    public function cabang()
    {
        return $this->hasMany(Cabang::class);
    }
}
