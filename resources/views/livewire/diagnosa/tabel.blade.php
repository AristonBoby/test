    <div class="col-md-12 col-sm-12 col-lg-8">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title ">Data Pasien Yang Telah Dilayani</h3>
                <div wire:loading>
                    <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-sm fas fa fa-spinner fa-spin"></i> &nbsp; Loading...</span>
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
                    <div class="col-md-8">
                        <p class="text-sm text-danger">* Data Pasien yang ditampilkan berdasarkan tanggal terdaftar pasien</p>
                    </div>
                    <div class="col-md-12 col-lg-4 col-sm-12 mb-3 float-right">
                        <div class="form-group row">
                            <label class="form-label col-md-12 col-lg-3 col-sm-12 text-xs"> Tanggal </label>
                                <div class="col-lg-9 col-md-12 col-sm-12">
                                    <div class="input-group mb-3">
                                        <input type="date"  wire:model="tanggal" class=" form-control form-control-sm text-sm rounded-0">
                                        <button class="btn btn-sm btn-primary btn-flat" wire:click="pasienDiagnosa">Cari</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table-sm table table-hover text-sm table-striped text-uppercase text-center">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Rekam Medis</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">TGL Lahir</th>
                                <th class="text-center">Kelamin</th>
                                <th class="text-center">Poli</th>
                                <th class="text-ceneter">Dokter</th>
                                <th class="text-center"> ICD</th>
                                <th  width="30%" class="text-center">Diagnosa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($pasiendiagnosa))    
                                @foreach ($pasiendiagnosa as $no=>$data)
                                <tr height="5px">
                                    <td>{{$no+1}}.</td>
                                    <td>@if(!empty($data->no_Rm)){{$data->no_Rm}}@endif</td>
                                    <td>@if(!empty($data->nama)){{$data->nama}}@endif</td>
                                    <td>@if(!empty($data->tanggal_Lahir)){{$data->tanggal_Lahir}}@endif</td>
                                    <td>@if(!empty($data->jenkel)){{$data->jenkel}}@endif</td>
                                    <td>@if(!empty($data->nama_poli)){{$data->nama_poli}}@endif</td>
                                    <td>@if(!empty($data->dokter)){{$data->dokter}}@endif</td>
                                    <td>{{$data->icd}}</td>
                                    <td width="30%">{{$data->diagnosa}}</td>
                                    <td><a class="btn btn-sm btn-danger"><i class="fas fa-light fa-trash-alt"></i></a></td>
                                </tr>
                                @endforeach
                            @endif 
                        </tbody>
                    </table>
                </div>
            </div>  
            <div class="card-footer float-right">
                    
            </div>

        </div>
        <style>
            nav svg{
                height:20px;
            }
        </style>
    </div>    

    <script>
        window.addEventListener('show-delete-confirmation', event => {
                  Swal.fire({
                  title: 'Apakah Anda ingin Menghapus?',
                  text: "Hapus Data",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                  confirmButtonText: 'YA'
                }).then((result) => {
                  if (result.isConfirmed) {
                      Livewire.emit('deleteConfirmed')
                  }
                })
          });
         

        window.addEventListener('editPasien', event => {
                  Swal.fire({
                  title: 'Berhasil ',
                  text: "Data Pasien Berhasil di Update",
                  icon: 'success',
                })
          });
        
  </script>
