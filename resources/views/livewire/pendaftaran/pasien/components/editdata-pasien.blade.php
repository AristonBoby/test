    <div class="col-md-12 col-sm-12 col-lg-8">
        <div class="card card-primary card-outline">
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
                <table class="table table-sm table- table-hover text-sm text-center">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Rekam Medis</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Kelamin</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">BPJS</th>
                            <th class="text-center">User</th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    <tbody  style="overflow:auto;" wire:loading.remove>
                        @if($pasien->isEmpty())
                        <tr>
                            <td colspan="9">Data Kosong</td>
                        </tr>
                        @endif
                        @foreach ($pasien as $index => $query)
                            <tr>
                                <td>{{$pasien->firstItem() + $index}}</td>
                                <td>{{$query->no_Rm}}</td>
                                <td>{{$query->nama}}</td>
                                <td>{{$query->tanggal_Lahir}}</td>
                                <td text-center>{{$query->jenkel}}</td>
                                <td>{{$query->nik}}</td>
                                <td>{{$query->bpjs}}</td>
                                <td>{{$query->name}}</td>
                                <td>
                                    <a class="btn btn-sm btn-info"  data-toggle="modal" data-target="#staticBackdrop" wire:click.prevent="detailPasien('{{$query->id}}')"><i class="far fa-eye"></i></a>
                                </td>                  
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div  class="text-center" wire:loading>
                    <p >Loading...</p>
                </div>
                <div class="btn-sm rounded-0 btn-flat">
                    {{$pasien->links()}}
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