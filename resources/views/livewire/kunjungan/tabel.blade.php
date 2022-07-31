
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
                        <p class="text-sm text-danger">* Data Pasien yang ditampilkan berdasarkan tanggal terdaftar pasien</p>
                    </div>
                    <div class="col-md-4 mb-3 float-right">
                        <div class="form-group row">
                            <label class="form-label col-md-4 text-sm"> Tanggal</label>
                                <div class="col-md-8">
                                    <div class="input-group mb-3">
                                        <input type="date"  wire:model="tanggal" class=" form-control form-control-sm">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-hover text-sm">
           
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No Rekam Medis</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">No BPJS</th>
                            <th class="text-center">Alamat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a class="btn btn-xs btn-primary"  data-toggle="modal" data-target="#staticBackdrop" ><i class="fas fa-thin fa-eye"></i></a>
                                    <a class="btn btn-xs btn-warning"  data-toggle="modal" data-target="#edit" ><i class="fas fa-light fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" href="javascript:void(0)"  target="blank_"><i class="fas fa-light fa-trash"></i></a>
                                </td>                  
                            </tr>
                 
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
