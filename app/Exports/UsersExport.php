<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
class UsersExport implements FromCollection, WithColumnFormatting, WithColumnWidths
{   public $data;
    /**]
    * @return \Illuminate\Support\Collection
    */



    public function collection()
    {
        return DB::table('kunjungans')
                    ->join('pasiens','kunjungans.id_pasien','pasiens.id')
                    ->get();
    }

    public function columnFormats()
    {
        return [

        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 205,
        ];
    }
}
