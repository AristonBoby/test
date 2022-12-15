<div class="card card-warning card-outline">
    <div class="card-header">
        <h5 class="card-title">Laporan Pasien Berdasarkan Wilayah</h5>
    </div>
    <div class="card-body">
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
                @foreach ($jumlah as $no=>$data) 
                        <tr wire:loading.remove>
                            <td>{{$jumlah->firstItem()+$no}}</td>
                            <td>{{$data->prov_name}}</td>
                            <td>{{$data->kota_name}}</td>
                            <td>{{$data->kec_name}}</td>
                            <td>{{$data->kel_name}}</td>
                            <td>{{$data->jumlah}}</td>
                        </tr>
                @endforeach
           </tbody>
        </table>
       
    </div>
    <div class="card-footer">
        <div class=" text-xs btn-flat btn-xs">
            {{$jumlah->links()}}
        </div>
    </div>

</div>
