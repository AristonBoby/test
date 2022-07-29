<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class diagnosa extends Model
{
    use HasFactory;

    protected $fillable = ['id_dokter','id_kunjungan','id_icd'];

    public function dokter()
    {
        return $this->BelongsTo(dokter::class,'id_dok','id_dokter');
    }

    public function kunjungan()
    {
        return $this->BelongsTo(kunjungan::class,'id_kunjungan','id');
    }
    public function icd()
    {
        return $this->belongsTo(icd::class,'id_icd','icd_code');
    }
}
