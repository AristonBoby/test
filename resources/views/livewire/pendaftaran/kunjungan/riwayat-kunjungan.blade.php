<div class="col-lg-4 col-md-8 col-sm-12 btn-xs">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title"><b><i class="fa fa-table text-sm"></i> RIwayat Kunjungan</b> Pasien</h3>
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
                @empty(!$riwayat)
                        <table class="table table-sm text-xs table-bordered table-hover table-striped" >
                            <thead>
                                <tr>
                                    <th width=10>No.</th>
                                    <th width=70 align="center">Tanggal</th>
                                    <th width=180>Jaminan</th>
                                    <th width=180>Poli</th>
                                    <th width=180>Action</th>
                                </tr>
                            </thead>
                            @foreach ($riwayat as $no=>$data )
                            <tr>
                                <td>{{$no+$riwayat->firstItem()}}.</td>
                                <td>{{\Carbon\Carbon::parse($data->tanggal)->format('d-m-Y')}}</td>
                                <td>{{$data->jaminan}}</td>
                                <td>{{$data->nama_poli}}</td>
                                <td width='5%'><button  data-toggle="modal" data-target="#modalHapus" wire:click.prevent="idHapus({{$data->id}})" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt text-center"></i></button></td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="mt-4 row">
                            <span class="text-xs btn-xs col-md-9 col-sm-9 col-lg-9">
                                {{ $riwayat->links() }}
                            </span>
                                <p class=" text-left text-sm col-lg-3 col-md-3 col-sm-3 mt-2">Showing {{$riwayat->currentPage()}} - {{$riwayat->lastPage()}} of {{$riwayat->total()}}</p>
                        </div>
                @endempty
            </div>
        </div>
    </div>
    @include('livewire.pendaftaran.kunjungan.modalDeleteRiwayat')
</div>
<script>
    window.addEventListener('closeModalDelate', event=>{
        $('#modalHapus').modal('hide');
    });
</script>
