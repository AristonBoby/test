<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class icd extends Model
{
    use HasFactory;
    protected $table = "icd10";


public function diagnosa()
{
    return $this->hasMany(diagnosa::class,'icd_code','id_icd');
}

}


