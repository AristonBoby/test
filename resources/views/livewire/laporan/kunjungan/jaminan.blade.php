<div class="card card-success card-outline">
    <div class="card-header">
        <h5 class="card-title"> Laporan Jumlah Jaminan</h5>
    </div>
    <div class="card-body text-sm text-center">
            <table class="table table-bordered table-hover table-sm" >
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jaminan</th>
                        <th>Jumlah</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr wire:loading>
                        <td>Loading...</td>
                    </tr>
                    @empty(!$jumlahJaminan)
                        @foreach ($jumlahJaminan as $no=>$data )
                            <tr wire:loading.remove>
                                <td>{{$no+1}}</td>
                                <td>{{$data->jaminan}}</td>
                                <td>{{$data->jumlah}}</td>
                            </tr>
                        @endforeach
                    @endempty
                </tbody>
            </table>
    </div>
</div>
