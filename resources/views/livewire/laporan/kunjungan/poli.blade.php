<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="card-title"><b>Laporan Jumlah</b> Poli</h5>
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
                        <th>Poli</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @empty(!$jumlahPoli)
                        @foreach ($jumlahPoli as $no=>$data)
                        <tr wire:loading.remove>
                            <td>{{$no+$jumlahPoli->firstItem()}}.</td>
                            <td class="text-left">{{$data->nama_poli}}</td>
                            <td width='55'><button data-toggle="modal" wire:click="modalPoli({{$data->id_poli}})" data-target="#modalLaporanPoli" class=" btn btn-default btn-xs btn-block"><b>{{$data->jumlah}}</b></button></td>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan='2'><b>TOTAL</b></th>
                            <th><b>{{$total}}</b></th>
                        </tr>
                    @endempty
                </tbody>
            </table>
            <div class="col-md-6 col-sm-6 col-lg-6 mt-3 text-xs">
                {{ $jumlahPoli->links() }}
            </div>
    </div>
    <livewire:laporan.kunjungan.modal.poli>
</div>
