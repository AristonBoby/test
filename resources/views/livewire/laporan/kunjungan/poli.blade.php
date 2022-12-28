<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title"><b>Laporan Jumlah</b> Poli</h5>
        <div wire:loading>
            <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
        </div>
    </div>
    <div class="card-body text-sm text-center">
        
            <table class="table table-striped table-bordered table-hover table-sm" >
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Poli</th>
                        <th>Jumlah</th> 
                    </tr>
                </thead>
                <tbody>
                    @empty(!$jumlahPoli)
                        @foreach ($jumlahPoli as $no=>$data)
                        <tr wire:loading.remove>
                            <td>{{$no+1}}</td>
                            <td class="text-left">{{$data->nama_poli}}</td>
                            <td>{{$data->jumlah}}</td> 
                        </tr>
                        @endforeach
                    @endempty

                </tbody>
            </table>
    </div>
</div>
