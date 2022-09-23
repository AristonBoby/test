<div class="col-md-12 col-sm-12 col-lg-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Pencarian Data Pasien</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tools" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tools" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <p class="text-sm text-danger">* Pencarian Pasien dapat menggunakan NAMA NIK BPJS</p>
                </div>
                <div class="col-md-4 mb-3 float-right">
                    <div class="form-group row">
                        <label class="form-label col-md-4 text-sm"> Pencarian Pasien</label>
                            <div class="col-md-8">
                                <div class="input-group mb-3">
                                    <input type="text"  wire:model="caripasien" class=" form-control form-control-sm rounded-0" placeholder="Pencarian Pasien">
                                    <a class="btn btn-primary btn-sm btn-flat" wire:click="render()" wire:loading.target='table'>Cari</a>
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
                <tbody wire:loading.remove='table'>
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
                                <a class="btn btn-xs btn-warning btn-flat"  data-toggle="modal" data-target="#edit" wire:click="edit({{$query->id}})"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-xs btn-danger btn-flat" href="javascript:void(0)" wire:click.prevent='deleteConfirmation({{$query->id}})' target="blank_"><i class="fas fa-light fa-trash-alt"></i></a>
                            </td>                  
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div  class="text-center" wire:loading wire:loading.target='table'>
                <p >Loading...</p>
            </div>
        </div>  
        <div class="card-footer btn-sm text-sm rounded-0 btn-flat">
                {{$pasien->links()}}
        </div>
        @include('livewire.pendaftaran.pasien.components.modal')
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