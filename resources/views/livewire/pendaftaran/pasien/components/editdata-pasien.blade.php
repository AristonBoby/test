    <div class="col-md-12 col-sm-12 col-lg-8">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Data Pasien</h3>
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
                    <div class="col-md-8">
                        <p class="text-sm text-danger">* Data Pasien yang ditampilkan berdasarkan tanggal terdaftar pasien</p>
                    </div>
                    <div class="col-md-4 mb-3 float-right">
                        <div class="form-group row">
                            <label class="form-label col-md-4 text-sm"> Tanggal</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="date"  wire:model="tanggal" class=" form-control form-control-sm">
                                        <a class="btn btn-primary btn-sm btn-flat" wire:click="render()">Cari</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <table class="table table-sm table-bordered table-hover text-sm text-center">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Rekam Medis</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Kelamin</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">BPJS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $index => $query)
                            <tr>
                                <td>{{$pasien->firstItem() + $index}}</td>
                                <td>{{$query->no_Rm}}</td>
                                <td>{{$query->nama}}</td>
                                <td>{{$query->tanggal_Lahir}}</td>
                                <td text-center>{{$query->jenkel}}</td>
                                <td>{{$query->nik}}</td>
                                <td>{{$query->bpjs}}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary btn-flat"  data-toggle="modal" data-target="#staticBackdrop" wire:click.prevent="detailPasien('{{$query->id}}')"><i class="far fa-eye"></i></a>
                                </td>                  
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
            <div class="card-footer btn-sm text-sm rounded-0 btn-flat">
                    {{$pasien->links()}}
            </div>
            @include('livewire.pendaftaran.pasien.components.modaldetailpasien')
        </div>
        <style>
            nav svg{
                height:20px;
            }
        </style>
    </div>    