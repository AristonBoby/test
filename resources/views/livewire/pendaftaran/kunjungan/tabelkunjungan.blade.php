    <div class="col-md-12 col-sm-12 col-lg-8 ">
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
            <div class="card-body table-responsive">
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
                                        <button class="btn btn-primary btn-sm btn-flat" wire:click='render'>Refresh</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div>
                <table class="table table-bordered table-hover text-xs mb-2 table-striped text-center table-sm" style="margin-top:-20px; table-responsive">
                    <thead>
                        <tr>
                            <th class=" ">No</th>
                            <th class="text-center">No Rekam Medis</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tgl Lahir</th>
                            <th class="text-center">Kelamin</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Poli</th>
                            <th class="text-center">Jaminan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr wire:loading>
                                <td colspan="9" class="text-sm">Loading...</td>
                            </tr>
                            @if($query->isEmpty())
                            <tr wire:loading.remove>
                                <td colspan="9" class="text-sm">Data Kosong</td>
                            </tr>
                            @endif
                            @foreach ($query as $no => $data)
                                </tr>
                                <tr wire:loading.remove>
                                    <td>{{$query->firstItem() + $no}}</td>
                                    <td>{{$data->no_Rm}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->tanggal_Lahir}}</td>
                                    <td>{{$data->jenkel}}</td>
                                    <td>{{$data->nik}}</td>
                                    <td>{{$data->nama_poli}}</td>
                                    <td>{{$data->jaminan}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-danger text-xs" wire:click="konfirmasihapus({{$data->id}})"><i class="fas fa-light fa-trash-alt"></i></a>
                                    </td>                  
                                </tr>
                            @endforeach
                            
                    </tbody>
                       
                </table>
                </div>
                <div class=" text-xs btn-flat btn-xs">
                    <span class="text-sm"><i>Total {{$query->total()}}</i>
                    <span class="float-right btn-xs text-xs ">{{$query->links()}}</span>
                   
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
