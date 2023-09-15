    <div class="col-md-12 col-sm-12 col-lg-8">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title"><b><i class="fa fa-table text-sm"></i> Table Pendaftaran</b> Pasien</h5>
                <div wire:loading>
                    <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
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
                <div class="row">
                    <div class="col-md-12">
                        <code>* Data Pasien yang ditampilkan berdasarkan tanggal pasien di input</code>
                    </div>
                    <div class="col-md-12 mb-3 ">
                        <div class="col-md-4 form-group float-right row">
                            <label class="form-label col-md-3 text-sm"> Tanggal</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                            </span>
                                        </span>
                                        <input type="text" value="{{$tanggal}}"  onchange='Livewire.emit("tglKunjungan", this.value)' readonly class=" date form-control form-control-sm" wire.target="table">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary btn-sm" wire:click="render()"wire.target="table"><i class="fa fa-search"></i> Cari</button>
                                        </span>
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover text-sm text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">No. RM</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Tanggal Lahir</th>
                                <th class="text-center">Umur</th>
                                <th class="text-center">Kelamin</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">BPJS</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            @if($pasien->count() === 0)
                            <tr>
                                <td colspan="9">Pasien tidak ditemukan <span class="fa fa-database fa-light text-xs" aria-hidden="true"></span></td>
                            </tr>
                            @endif
                            @foreach ($pasien as $index => $query)
                                <tr class="text-uppercase"style='@if(\Carbon\Carbon::parse($query->tanggal_Lahir)->age >= 60 ) background-color:#ffffd6 @endif'>
                                    <td>{{$pasien->firstItem() + $index}}.</td>
                                    <td class="text-left">{{$query->no_Rm}}</td>
                                    <td class="text-left">{{$query->nama}}</td>
                                    <td>{{\Carbon\Carbon::parse($query->tanggal_Lahir)->format('d-m-Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($query->tanggal_Lahir)->age}}</td>
                                    <td text-center>{{$query->jenkel}}</td>
                                    <td>{{$query->nik}}</td>
                                    <td>{{$query->bpjs}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary rounded-0" wire:click.prevent="generalconsent('{{ $query->id }}')"><i class="text-xs fa fa-print"></i></button>
                                        <button data-target="#generalconsent" data-toggle="modal" wire:click="tampilkanGeneralConsent('{{ $query->id }}')" class="btn btn-sm btn-success rounded-0" ><i class="text-xs fa fa-edit"></i> General Consent</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9"></td>
                        </tr>
                    </tfoot>
                    </table>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-10">
                                <span class="btn-sm float-left">{{$pasien->links()}}</span>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-2">
                                <span class="text-sm float-right">Showing {{$pasien->currentPage()}} - {{$pasien->lastPage()}} of {{$pasien->total()}}</span>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <style>
            nav svg{
                height:20px;
            }
        </style>
            @include('livewire.pendaftaran.pasien.components.modalgeneralconsent')
    </div>
<script>
        window.addEventListener('modalGeneralConsent', event => {
            window.open ('printpasien/'+event.detail.id,'_blank');
      });

</script>
