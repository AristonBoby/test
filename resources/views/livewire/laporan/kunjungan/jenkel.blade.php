<div class="card card-outline card-warning">
    <div class="card-header">
        <h5 class="card-title"><b>Laporan Kunjungan </b> Jenis Kelamin </h5>
        <div wire:loading>
            <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm table-bordered text-sm table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenkel</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @empty(!$jenkel)
                    @foreach ($jenkel as $no=>$data)
                        <tr>
                            <td>{{$no+1}}.</td>
                            <td>@if($data->jenkel == 'L') Laki-laki @elseif($data->jenkel == 'P') Perempuan @endif</td>
                            <td>{{$data->jumlah}}</td>
                        </tr>
                    @endforeach
                @endempty
            </tbody>
        </table>
    </div>
</div>
