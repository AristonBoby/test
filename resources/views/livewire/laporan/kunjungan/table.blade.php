<div class="card card-warning card-outline">
    <div class="card-header">
        <h5 class="card-title">Laporan Kunjungan Pasien</h5>
    </div>
    <div class="card-body">
        <div class="col-md-12 col-sm-12 col-lg-12 ">
            <div class="form-group row">
                <span class="col-md-1 form-label">Tanggal</span>
                <div class="col-md-2 col-sm-4 col-lg-2">
                    <input type="date" wire:model='tanggalMulai'> -
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-sm-4 col-lg-2">
                        <input type="date" wire:model='tanggalSelesai'>
                </div>

            </div>
        </div>
        <table class="table table-bordered table-sm text-sm">
           <thead>
                <tr>
                    <th>No.</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Jumlah</th>
                </tr>
           </thead>
           <tbody>
                        <tr wire:loading>
                            <td colspan="5">Loading...</td>
                        </tr>
          
           </tbody>
        </table>
       
    </div>
    <div class="card-footer">
        <div class=" text-xs btn-flat btn-xs">

        </div>
    </div>

</div>
