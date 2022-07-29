<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poli extends Model
{
    use HasFactory;


    public function kunjungan()
    {
        return $this->hasMany(kunjungan::class,'id_poli','id_poli');
    }
}
