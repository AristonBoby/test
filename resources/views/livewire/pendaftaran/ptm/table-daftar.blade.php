<div class="col-md-12 col-sm-12 col-lg-8">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Daftar</b>PTM</h5>
            <div wire:loading>
                <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
        </div>
        <div class="card-body">
            <div class="col-lg-12 ">
                <div class="col-md-3  col-sm-3 col-lg-3 float-right">
                    <div class="input-group">
                        <input readonly type="text" class=" date form-control form-control-sm" onchange='Livewire.emit("tanggal", this.value)'value="{{$tanggal}}">
                        <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </span>
                        <span class="input-group-append">
                            <button class="btn btn-sm btn-primary" wire:click="render">
                                Cari
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive mt-4">
                    <table class="table table-sm table-hover text-sm text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tgl Lahir</th>
                                <th>Umur</th>
                                <th>Kelamin</th>
                                <th>NIK</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ( $ptm as $no => $data )
                        <tbody>
                            <tr wire:loading>
                                <td>Loading...</td>
                            </tr>
                            <tr wire:loading.remove>
                                <td>{{$ptm->firstItem()+$no}}.</td>
                                <td class="">{{$data->nama}}</td>   
                                <td>{{\Carbon\Carbon::parse($data->tanggal_Lahir)->format('d-m-Y')}}</td>
                                <td>{{\Carbon\Carbon::parse($data->tanggal_Lahir)->age}}</td>
                                <td>{{$data->jenkel}}</td>
                                <td>{{$data->nik}}</td>
                                <td>
                                    @if($data->skrining == 0)<button class="btn btn-primary btn-xs text-xs" data-target="#riwayatDialog">Skrining</button>@endif
                                    @if($data->skrining == 1)<button class="btn btn-success btn-xs text-xs">Sudah Skrining</button>@endif
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt fa-light "></i></button>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    <div class="float-left">
                                        <span class="text-lefttext-sm mt-6">Showing {{$ptm->currentPage()}} - {{$ptm->lastPage()}} of {{$ptm->total()}}</span>
                                    </div>
                                </td>
                                <td colspan="7">
                                    <div class="">
                                        <span class="btn-sm float-right">{{$ptm->links()}}</span>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.date').datepicker({
            format: "dd-mm-yyyy"
        });
    });
</script>