<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kunjungan extends Model
{
    use HasFactory;

    protected $fillable = ['id_pasien','id_poli','id_user','tanggal','id_jaminan'];
    
    
    public function pasien()
    {
        return $this->belongsTo(pasien::class, 'id_pasien','id');
    }

    public function poli()
    {
        return $this->belongsTo(poli::class,'id_poli','id_poli');
    } 

    public function diagnosa()
    {
        return $this->hasmany(diagnosa::class,'id','id_kunjungan');
    }
}
