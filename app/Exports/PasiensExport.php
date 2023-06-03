<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use App\Models\Pasiens;
use App\Models\pasien;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithHeadings;
class PasiensExport implements FromCollection, WithColumnFormatting, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $data = DB::table('pasiens')
                ->join('users','pasiens.id_user','users.id')
                ->join('kelurahans','pasiens.kel_id','kelurahans.id_kel')
                ->join('kecamatans','kelurahans.kec_id','kecamatans.id_kec')
                ->join('kotas','kecamatans.kota_id','kotas.kota_id')
                ->join('provinsis','kotas.prov_id','provinsis.prov_id')
                ->select('pasiens.id',
                 'pasiens.no_Rm',
                 'pasiens.nama',
                 'tanggal_Lahir',
                 'jenkel',
                 'no_tlpn',
                 'pekerjaan',
                 'nik',
                 'bpjs',
                 'provinsis.prov_name',
                 'kotas.kota_name',
                 'kecamatans.kec_name',
                 'kotas.kota_name',
                 'kelurahans.kel_name',
                 'pasiens.alamat',

                 )->get();

        return $data;
    }

    public function columnFormats(): array
    {
        return [
            //'B' => NumberFormat::FORMAT_TEXT,
            'G' => '0'
        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nomor Rekam Medis',
            'Nama',
            'Tanggal Lahir',
            'Jenkel',
            'Nomor Telepon',
            'NIK',
            'BPJS',
            'Provinsi',
            'Kota',
            'Kecamatan',
            'Kelurahan',
            'Alamat'
        ];
    }
}
