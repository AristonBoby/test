<div class="col-lg-4 col-md-8 col-sm-12 btn-xs">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><b>Riwayat Kunjungan</b> Pasien</h3>
            <div wire:loading>
                <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">

            <div class="col-md-12 col-sm-12 col-lg-12">
                @empty(!$riwayatKunjungan)
                        <table class="table table-sm text-xs table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th width=10>No.</th>
                                    <th width=70 align="center">Tanggal</th>
                                    <th width=180>Jaminan</th>
                                    <th width=180>Poli</th>
                                </tr>
                            </thead>
                            @foreach ($riwayatKunjungan as $no=>$data )
                            <tr>
                                <td>{{$no+1}}.</td>
                                <td>{{$data->tanggal}}</td>
                                <td>{{$data->jaminan}}</td>
                                <td>{{$data->nama_poli}}</td>
                            </tr>
                            @endforeach
                        </table>
                @endempty
            </div>
        </div>
    </div>

</div>
