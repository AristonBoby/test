<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
    use HasFactory;

    public function diagnosa()
    {
        return $this->hasMany(diagnosa::class,'id_dokter','id_dok');
    }
}
