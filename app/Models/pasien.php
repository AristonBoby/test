<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_Rm',
        'nama',
        'tempat_Lahir',
        'tanggal_Lahir',
        'kepala_keluarga',
        'jenkel',
        'agama',
        'pekerjaan',
        'nik',
        'no_tlpn',
        'bpjs',
        'alamat',
        'id_user',
        'kel_id'
    ];

    public function kunjungan(){
        return $this->hasMany(kunjungan::class,'id','id_pasien');
    }

}
