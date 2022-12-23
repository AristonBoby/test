<div class="col-md-12 col-sm-12 col-lg-12">
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Pencarian Data</b> Pasien</h5>
            <div wire:loading>
                <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <code>* Pencarian Pasien dapat menggunakan : Nomor Rekam Medis, Nama, NIK, BPJS</code>
                </div>
                <div class="col-md-4 mb-3 float-right">
                    <div class="form-group row">
                        <label class="form-label col-md-4 text-sm"> Pencarian Pasien</label>
                            <div class="col-md-8">
                                <div class="input-group mb-3">
                                    <input type="text"  wire:model="caripasien" class=" form-control form-control-sm rounded-0" placeholder="Pencarian Pasien">
                                    <a class="btn btn-primary btn-sm" wire:click="render()" wire:loading.target='table'>Cari</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <table class="table table-sm table-bordered table-hover text-xs table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">No Rekam Medis</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Tanggal Lahir</th>
                        <th class="text-center">Kelamin</th>
                        <th class="text-center">No. Telepon / HP</th>
                        <th class="text-center">NIK</th>
                        <th class="text-center">BPJS</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Petugas Pendaftar</th>
                        <th class="text-center">Tanggal Daftar</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                  
                    @foreach ($pasien as $index => $query)
                        <tr style=" overflow-y: scroll;">
                            <td>{{$pasien->firstItem() + $index}}.</td>
                            <td>{{$query->no_Rm}}</td>
                            <td class="text-left text-uppercase">{{$query->nama}}</td>
                            <td>{{$query->tanggal_Lahir}}</td>
                            <td text-center>{{$query->jenkel}}</td>
                            <td>{{$query->no_tlpn}}</td>
                            <td>{{$query->nik}}</td>
                            <td>{{$query->bpjs}}</td>
                            <td class="text-left text-uppercase">{{$query->alamat}} Kelurahan {{$query->kel_name}} Kecamatan {{$query->kec_name}} kota {{$query->kota_name}}</td>
                            <td class="text-center text-left text-uppercase">{{$query->name}}</td>
                            <td>{{$query->created_at}}</td>
                            <td>
                                <div class="btn-group text-xs">
                                    <a class="btn btn-sm btn-info   "  data-toggle="modal" data-target="#staticBackdrop" wire:click.prevent="detailPasien('{{$query->id}}')"><i class="text-xs far fa-eye"></i></a>
                                    <a class="btn btn-sm btn-warning"  data-toggle="modal" data-target="#edit" wire:click="edit({{$query->id}})"><i class="text-xs fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" wire:click.prevent='deleteConfirmation({{$query->id}})' target="blank_"><i class="text-xs fas fa-light fa-trash-alt"></i></a>
                                </div>
                            </td>                  
                        </tr>
                    @endforeach
                </tbody>
            </table>
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