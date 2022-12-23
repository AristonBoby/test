<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;
class UsersExport implements FromView,FromCollection
{   public $data;
    /**]
    * @return \Illuminate\Support\Collection
    */

    public function __construct($keyword)
    {
        $this->data = $keyword;
    }

    public function collection()
    {
        return DB::table('kunjungans')
                    ->join('pasiens','kunjungans.id_pasien','pasiens.id')
                    ->get();
    }
}
