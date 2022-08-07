<div class="card card-primary col-md-10 offset-md-1">
    <div class="card-header">
        <div>Laporan Kunjungan</div>
    </div>
    <div class="card-body">
        <div class="row ">
            <div class="col-lg-3 row">
                <label class="form-label text-sm col-lg-5">Mulai Tanggal</label>
                <div class="col-lg-6">
                    <input type="date" wire:model='mulaitanggal' class="form-control form-control-sm rounded-0">
                </div>
            </div>
            <div class="col-lg-3 row">
                <label class="form-label text-sm col-lg-5">Sampai Tanggal</label>
                <div class="col-lg-6">
                    <input type="date" wire:model='sampaitanggal' class="form-control form-control-sm rounded-0">
                </div>
            </div>
        </div>
        <table class="table  text-md table-sm" style="margin-top:30px;">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Poli</th>
                    <th class="text-center">Jumlah</th>
                </tr>
            </thead>
            @foreach ($laporanpoli as $key=>$laporan)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$laporan->nama_poli}}</td>
                <td class=" text-center"><span class="badge bg-success text-sm"><b>{{$laporan->jumlah}}</b></span></td>
            </tr>
            @endforeach

        </table>
    </div>
</div>
