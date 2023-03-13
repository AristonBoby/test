<div class="card card-success card-outline">
    <div class="card-header">
        <h5 class="card-title"> <b>Laporan Jumlah</b> Jaminan</h5>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
            </button>

            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
            </button>
        </div>
            <div wire:loading>
                <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
    </div>
    <div class="card-body text-sm text-center">
            <table class="table table-striped table-bordered table-hover table-sm" >
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jaminan</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @empty(!$jumlahJaminan)
                        @foreach ($jumlahJaminan as $no=>$data )
                            <tr wire:loading.remove>
                                <td>{{$no+1}}.</td>
                                <td class="text-left">{{$data->jaminan}}</td>
                                <td>{{$data->jumlah}}</td>
                            </tr>
                        @endforeach
                            <tr>
                                <th colspan="2" class="text-center">TOTAL</th>
                                <th>{{$totalJaminan}}</th>
                            </tr>
                    @endempty

                </tbody>
            </table>
    </div>
</div>
