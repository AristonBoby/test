
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card card-info card">
            <div class="card-header">
                <h3 class="card-title ">Data Pasien Yang Telah Dilayani</h3>
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
                    <div class="col-lg-2 col-md-12 col-sm-12 mb-3 float-right">
                        <div class="form-group row">
                            <label class="form-label col-lg-4 col-sm-12 text-sm"> Status </label>
                                <div class="col-lg-8 col-sm-12">
                                    <div class="input-group mb-3">
                                        <select class="form-control form-control-sm">
                                            <option value="">Belum Dilayani</option>
                                            <option>Sudah Dilayani</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-2 col-sm-12 mb-3 float-right">
                        <div class="form-group row">
                            <label class="form-label col-md-12 col-lg-4 col-sm-12 text-sm"> Tanggal </label>
                                <div class="col-lg-8 col-md-12 col-sm-12">
                                    <div class="input-group mb-3">
                                        <input type="date"  wire:model="tanggal" class=" form-control form-control-sm">
                                    </div>
                                </div>
                                <button wire:click="pasienDiagnosa">CEK</button>
                        </div>
                    </div>
                </div>
                <table class="table-sm table table-bordered table-hover text-sm text-center">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Rekam Medis</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Kelamin</th>
                            <th class="text-center">Poli</th>
                            <th class="text-ceneter">Dokter</th>
                            <th class="text-center">Diagnosa</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($pasiendiagnosa))
                        {
                            @foreach ($pasiendiagnosa as $no=>$data )
                            <tr height="5px">
                                <td>{{$no+1}}</td>
                                <td>@if(!empty($data->no_Rm)){{$data->no_Rm}}@endif</td>
                                <td>@if(!empty($data->nama)){{$data->nama}}@endif</td>
                                <td>@if(!empty($data->tanggal_Lahir)){{$data->tanggal_Lahir}}@endif</td>
                                <td>@if(!empty($data->jenkel)){{$data->jenkel}}@endif</td>
                                <td>@if(!empty($data->nama_poli)){{$data->nama_poli}}@endif</td>
                                <td>@if(!empty($data->dokter)){{$data->dokter}}@endif</td>
                                <td>{{$data->diagnosa}}</td>

                                <td><a class="btn btn-xs btn-danger"><i class="fas fa-light fa-trash-alt"></i></a></td>
                            </tr>
                            @endforeach
                        }
                        @endif 
                    </tbody>
                </table>
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
          window.addEventListener('hapus', event => {
            Swal.fire({
                title: 'Berhasil',
                text: "Data Berhasil di Hapus",
                icon: 'success',
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
