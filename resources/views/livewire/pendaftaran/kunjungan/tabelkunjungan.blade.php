    <div class="col-md-12 col-sm-12 col-lg-8">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">Data Kunjungan Pasien</h3>
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
                        <p class="text-sm text-danger">* Data Kunjungan yang ditampilkan berdasarkan tanggal Kunjungan</p>
                    </div>
                    <div class="col-md-4 mb-3 float-right">
                        <div class="form-group row">
                            <label class="form-label col-md-4 text-sm"> Tanggal</label>
                                <div class="col-md-8">
                                    <div class="input-group mb-3">
                                        <input type="date"  wire:model="tanggal" class=" form-control form-control-sm">
                                        <button class="btn btn-primary btn-sm btn-flat" wire:click='render'>refresh</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-hover text-xs mb-2 text-center table-sm">
                    <thead>
                        <tr>
                            <th class=" ">No</th>
                            <th class="text-center">No Rekam Medis</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tgl Lahir</th>
                            <th class="text-center">Kelamin</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Poli</th>
                            <th class="text-center">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($query as $no => $data)
                                <tr>
                                    <td>{{$query->firstItem() + $no}}</td>
                                    <td>@if(!empty($data->pasien['no_Rm'])){{$data->pasien['no_Rm']}} @endif</td>
                                    <td>@if(!empty($data->pasien['nama'])){{$data->pasien['nama']}} @endif</td>
                                    <td>@if(!empty($data->pasien['tanggal_Lahir'])){{$data->pasien['tanggal_Lahir']}}@endif</td>
                                    <td>@if(!empty($data->pasien['jenkel'])){{$data->pasien['jenkel']}}@endif</td>
                                    <td>@if(!empty($data->pasien['nik'])){{$data->pasien['nik']}}@endif</td>
                                    <td>{{$data->poli['nama_poli']}}</td>
                                    <td>{{$data->tanggal}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-danger" wire:click="konfirmasihapus({{$data->id}})"><i class="fas fa-light fa-trash-alt"></i></a>
                                    </td>                  
                                </tr>
                            @endforeach
                            
                    </tbody>
                       
                </table>
                <div class=" float-right text-xs btn-flat btn-xs">
                    {{$query->links()}}
                </div>
    
            </div>  
           
        </div>
        <style>
            nav svg{
                height:20px;
            }
        </style>
    </div>    

    <script>
        window.addEventListener('konfirmasihapus', event => {
                  Swal.fire({
                  title: 'HAPUS',
                  text: "Apakah Anda Ingin Menghapus Data Kunjungan?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                  cancelButtonText : 'Tidak',
                  confirmButtonText: 'YA',
                }).then((result) => {
                  if (result.isConfirmed) {
                      Livewire.emit('hapus')
                  }
                })
          });

          window.addEventListener('berhasilhapus', event => {
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
