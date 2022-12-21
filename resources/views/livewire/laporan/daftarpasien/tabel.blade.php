<div class="card card-danger card-outline">
   <div class="card-header">
        <h5 class="card-title"><b>Laporan Pendaftaran</b> Pasien Baru</h5>
        <div wire:loading>
            <span class="badge bg-success text-sm" style="margin-left:5px;"> <i class="text-sm fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
        </div>
   </div>
   <div class="card-body">
        <table class="table table-bordered table-hover text-center text-sm table-sm table-striped">
            <thead>
                <tr>
                    <th width="10">No.</th>
                    <th>Nama</th>
                    <th width="90">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jumlah as $no=>$data )
                    <tr>
                        <td>{{$no+1}}.</td>
                        <td class="text-left">{{$data->name}}</td>
                        <td >{{$data->jumlah}} Pasien</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   </div>
</div>
