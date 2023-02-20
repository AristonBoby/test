<div class="col-md-12 col-sm-12 col-lg-12">
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Pencarian Data</b> Pasien</h5>
            <div wire:loading>
                <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
        </div>
        <div class="card-body">
            <a href="daftar" class="btn btn-primary mb-4 btn-sm" >+ Tambah Data Pasien</a>
                <div class="col-md-6 float-right">
                    <div class="form-group row">
                        <h5 class=" col-md-12 col-lg-3 col-sm-12"> Pencarian Pasien</h5>
                            <div class="col-md-6 col-lg-8 col-sm-12">
                                <input type="text"  wire:model.lazy="caripasien" class=" form-control " placeholder="Pencarian Data Pasien">
                            </div>
                    </div>
                </div>
                <p class="text-danger col-md-8 col-sm-12 col-lg-6">
                    * Pencarian Pasien dapat menggunakan : Nomor Rekam Medis, Nama, NIK, BPJS
                </p>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-sm table-hover text-sm text-center table-striped">
                    <thead>
                        <tr class="text-uppercase">
                            <th class="text-center">No.</th>
                            <th class="text-center">No Rekam Medis</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Umur</th>
                            <th class="text-center">Kelamin</th>
                            <th class="text-center">No. Telepon / HP</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">BPJS</th>
                            <th class="text-center" width="300">Alamat</th>
                            <th class="text-center">Petugas Pendaftar</th>
                            <th class="text-center">Tanggal Daftar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr wire:loading>
                            <td>Loading...</td>
                        </tr>
                        @foreach ($pasien as $index => $query)
                            <tr class="text-uppercase" wire:loading.remove>
                                <td>{{$pasien->firstItem() + $index}}.</td>
                                <td>{{$query->no_Rm}}</td>
                                <td class="text-left text-uppercase">{{$query->nama}}</td>
                                <td>{{ \Carbon\Carbon::parse($query->tanggal_Lahir)->format('d-m-Y')}}</td>
                                <td>{{ \Carbon\Carbon::parse($query->tanggal_Lahir)->age}} @if(\Carbon\Carbon::parse($query->tanggal_Lahir)->age >= 60 )<span class="badge badge-warning right">Lansia</span>@endif</td>
                                <td text-center>{{$query->jenkel}}</td>
                                <td>{{$query->no_tlpn}}</td>
                                <td>{{$query->nik}}</td>
                                <td>{{$query->bpjs}}</td>
                                <td width=00 class="text-left text-uppercase">{{$query->alamat}} Kelurahan {{$query->kel_name}} Kecamatan {{$query->kec_name}} kota {{$query->kota_name}}</td>
                                <td class="text-center text-left text-uppercase">{{$query->name}}</td>
                                <td>{{\Carbon\Carbon::parse($query->created_at)->format('d-m-Y')}}</td>
                                <td>
                                    <div class="btn-group text-xs">
                                        <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#staticBackdrop" wire:click.prevent="detailPasien('{{$query->id}}')"><i class="text-xs far fa-eye"></i></a>
                                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit" wire:click="edit({{$query->id}})"><i class="text-xs fa fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger" href="javascript:void(0)" wire:click.prevent='deleteConfirmation({{$query->id}})' target="blank_"><i class="text-xs fas fa-light fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <div class="col-md-12 col-lg-12 col-sm-12 row">
                            <tr>
                                <td colspan='13'>
                                <div>
                                    <span class=" mt-2 text-sm float-left">Showing {{$pasien->currentPage()}} - {{$pasien->lastPage()}} of {{$pasien->total()}}</span>
                                </div>
                                    <div class="float-right mt-2">
                                        <p class=" mt-4  btn-sm float-right">{{$pasien->links()}}</p>
                                    </div>
                                </td>
                            </tr>
                        </div>
                    </tfoot>
                </table>
            </div>
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
