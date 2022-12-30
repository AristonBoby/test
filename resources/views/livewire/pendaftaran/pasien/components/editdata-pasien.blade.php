    <div class="col-md-12 col-sm-12 col-lg-8">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title"><b>Table Pendaftaran</b> Pasien</h5> 
                <div wire:loading>
                    <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <code>* Data Pasien yang ditampilkan berdasarkan tanggal pasien di input</code>
                    </div>
                    <div class="col-md-4 mb-3 float-right">
                        <div class="form-group row">
                            <label class="form-label col-md-4 text-sm"> Tanggal</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="date"  wire:model="tanggal" class=" form-control form-control-sm" wire.target="table">
                                        <a class="btn btn-primary btn-sm btn-flat" wire:click="render()"wire.target="table">Cari</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-xs table-hover  text-sm text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">No. RM</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Tanggal Lahir</th>
                                <th class="text-center">Kelamin</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">BPJS</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            @if($pasien->isEmpty())
                            <tr>
                                <td colspan="9">Data Kosong</td>
                            </tr>
                            @endif
                            @foreach ($pasien as $index => $query)
                                <tr class="text-uppercase">
                                    <td>{{$pasien->firstItem() + $index}}.</td>
                                    <td class="text-left">{{$query->no_Rm}}</td>
                                    <td class="text-left">{{$query->nama}}</td>
                                    <td>{{$query->tanggal_Lahir}}</td>
                                    <td text-center>{{$query->jenkel}}</td>
                                    <td>{{$query->nik}}</td>
                                    <td>{{$query->bpjs}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info"  data-toggle="modal" data-target="#staticBackdrop" wire:click.prevent="detailPasien('{{$query->id}}')"><i class="text-xs far fa-eye"></i></a>
                                    </td>                  
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    <div class="float-left">
                                        <span class="text-lefttext-sm mt-6">Showing {{$pasien->currentPage()}} - {{$pasien->lastPage()}} of {{$pasien->total()}}</span>
                                    </div>
                                </td>
                                <td colspan="8">
                                    <div class="">
                                        <span class="btn-sm float-right">{{$pasien->links()}}</span>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div> 
           
           
            @include('livewire.pendaftaran.pasien.components.modaldetailpasien')
        </div>
        <style>
            nav svg{
                height:20px;
            }
        </style>
    </div>    