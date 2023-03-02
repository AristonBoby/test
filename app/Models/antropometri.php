<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class antropometri extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal','id_skrining','sistole','diastole','tinggi_badan','berat_badan','lingkar_perut','glukosa','id_user'];
}
