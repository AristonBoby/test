<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skriningPtm extends Model
{
    use HasFactory;
    protected $table = 'skrining_ptms';
    protected $fillable =
    [
        'id_pasien',
        'riwayatKeluarga1',
        'riwayatKeluarga2',
        'riwayatKeluarga3',
        'riwayatSendiri1',
        'riwayatSendiri2',
        'riwayatSendiri3',
        'merokok',
        'aktifitasFisik',
        'gula',
        'garam',
        'lemak',
        'sayur',
        'alkohol',
        'diagnosis1',
        'diagnosis2',
        'diagnosis3',
        'terapiFarmakologi',
        'konseling',
        'hasilIva',
        'tindakLanjutIva',
        'hasilSadanis',
        'tidakLanjutSadanis',
        'konselingUbm',
        'car',
        'ubm',
        'kondisi'

    ];
}
