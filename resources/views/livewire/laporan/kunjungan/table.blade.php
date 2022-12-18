<div class="card card-warning card-outline">
    <div class="card-header">
        <h5 class="card-title">Daftar Pasien</h5>
    </div>
    <div class="card-body text-sm text-center">
        <table class="table table-bordered table-sm text-sm table-hover table-striped">
           <thead>
                <tr>
                    <th>No.</th>
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
            <tr wire:loading>
                <td colspan="9">Loading...</td>
            </tr>  
            @if(empty($varLaporanPasien))
                <tr wire:loading.remove>
                    <td colspan="9" class="text-center"><i>Data Tidak Ditemukan</i></td>
                </tr>
            @endif
            @empty(!$varLaporanPasien)
                @foreach ($varLaporanPasien as $no=>$data)
                    <tr wire:loading.remove>
                        <td>{{$no+1}}</td>
                        <td>{{$data->no_Rm}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->tanggal_Lahir}}</td>
                        <td>{{$data->jenkel}}</td>
                        <td>{{$data->nik}}</td>
                        <td>{{$data->nama_poli}}</td>
                        <td>{{$data->jaminan}}</td>
                        <td>{{$data->alamat }}</td>
                    </tr>   
                @endforeach
            @endempty           
           </tbody>
        </table>
       
    </div>
    <div class="card-footer">
        <div class=" text-xs btn-flat btn-xs">

        </div>
    </div>
</div>
</div>
