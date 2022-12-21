<div class="col-lg-4 col-md-8 col-sm-12 btn-xs">   
    <div class="card card-success card-outline">
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
                    @foreach ($riwayatKunjungan as $data )
                        <table>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Jaminan</th>
                                <th>Poli</th>
                            </tr>
                        </table>
                    @endforeach
                @endempty
            </div>
        </div>
    </div>

</div>
