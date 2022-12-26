<div class="card card-warning card-outline table-responsive">
    <div class="card-header">
        <h5 class="card-title"><b>Table Daftar</b> Pasien</h5>
        <div wire:loading>
            <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
        </div>
    </div>
    <div class="card-body text-sm text-center ">
        <div class="table-responsive">
            <table class="text-uppercase table table-bordered table-sm text-xs table-hover table-striped">
            <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>No Rekam Medis</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Kelamin</th>
                        <th>NIK</th>
                        <th>Poli</th>
                        <th>Jaminan</th>
                        <th>Alamat</th>
                    </tr>
            </thead>
            <tbody>
                @if(empty($varLaporanPasien))
                    <tr wire:loading.remove>
                        <td colspan="10" class="text-center"><i>Data Tidak Ditemukan</i></td>
                    </tr>
                @endif
                @empty(!$varLaporanPasien)
                    @foreach ($varLaporanPasien as $no=>$data)
                        <tr>
                            <td >{{$no+1}}.</td>
                            <td>{{$data->tanggal}}</td>
                            <td>{{$data->no_Rm}}</td>
                            <td class="text-left">{{$data->nama}}</td>
                            <td>{{$data->tanggal_Lahir}}</td>
                            <td>{{$data->jenkel}}</td>
                            <td>{{$data->nik}}</td>
                            <td>{{$data->nama_poli}}</td>
                            <td>{{$data->jaminan}}</td>
                            <td class="text-left">{{$data->alamat }}</td>
                        </tr>
                    @endforeach
                @endempty
            </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class=" text-xs btn-flat btn-xs">

        </div>
    </div>
</div>

