<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poli extends Model
{
    use HasFactory;

    protected $fillable = ['id_poli','nama_poli','status'];

    public function kunjungan()
    {
        return $this->hasMany(kunjungan::class,'id_poli','id_poli');
    }
}
