<div class="col-md-12 col-sm-12 col-lg-12">
    @include('livewire.pendaftaran.pasien.components.modal')
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Pencarian Data</b> Pasien</h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div wire:loading>
                <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
        </div>

        <div class="card-body row">
            <div class="col-lg-12">
                <a href="daftar" class="btn btn-primary mb-4 btn-sm" >+ Tambah Data Pasien</a>
            </div>
                <div class=" col-lg-12">
                    <button type="submit" class="btn btn-sm btn-success" wire:click='print'>
                        <i class="fas fa-file-excel" aria-hidden="true"></i> Download Excel
                    </button>
                    <div class="col-lg-3 col-md-12 col-sm-12 float-right">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-md" wire:model.lazy="caripasien" placeholder="Pencarian Pasien">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-md btn-primary" wire:click='render'>
                                    <i class="fa fa-search"></i> Cari
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-lg-12">
                    <p class="text-danger ">
                        * Pencarian Pasien dapat menggunakan : Nomor Rekam Medis, Nama, NIK, BPJS
                    </p>
                <div>
            <div class="table-responsive mt-5">
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
                            <th class="text-center">Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr wire:loading>
                            <td>Loading...</td>
                        </tr>
                        @foreach ($pasien as $index => $query)
                            <tr class="text-uppercase" wire:loading.remove style='@if(\Carbon\Carbon::parse($query->tanggal_Lahir)->age >= 60 ) background-color:#ffffd6 @endif'>
                                <td>{{$pasien->firstItem() + $index}}.</td>
                                <td>@if(empty($query->no_Rm)) <span class="text-capitalize badge badge-danger text-xs right">Pasien di daftar Melalui PTM <br>Data Pasien Belum Lengkap</span> @else{{$query->no_Rm}}@endif</td>
                                <td class="text-left text-uppercase">{{$query->nama}}</td>
                                <td>{{ \Carbon\Carbon::parse($query->tanggal_Lahir)->format('d-m-Y')}}</td>
                                <td>{{ \Carbon\Carbon::parse($query->tanggal_Lahir)->age}}</td>
                                <td text-center>{{$query->jenkel}}</td>
                                <td>{{$query->no_tlpn}}</td>
                                <td>{{$query->nik}}</td>
                                <td>{{$query->bpjs}}</td>
                                <td width=00 class="text-left text-uppercase">{{$query->alamat}} Kelurahan {{$query->kel_name}} Kecamatan {{$query->kec_name}} kota {{$query->kota_name}}</td>
                                <td class="text-center text-left text-uppercase">{{$query->name}}</td>
                                <td>{{\Carbon\Carbon::parse($query->created_at)->format('d-m-Y')}}</td>
                                <td>@if(\Carbon\Carbon::parse($query->tanggal_Lahir)->age >= 60 )<span class="badge badge-warning right">Lansia</span>@endif
                                    <br>
                                    @if($query->ht == 1)
                                        <span class="badge badge-primary right">Hipertensi</span>
                                    @endif
                                    <br>
                                    @if($query->dm == 1)
                                        <span class="badge badge-danger right">Diabetes Melitus</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group text-xs">
                                        <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#staticBackdrop" wire:click.prevent="detailPasien('{{$query->id}}')"><i class="text-xs far fa-eye"></i></a>
                                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editDataPasien" wire:click="edit({{$query->id}})"><i class="text-xs fa fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger" href="javascript:void(0)" wire:click.prevent='deleteConfirmation({{$query->id}})' target="blank_"><i class="text-xs fas fa-light fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 row">
                <tr>
                    <td colspan='14'>
                    <div class="col-md-6">
                        <span class="mt-2  text-sm float-left">{{$pasien->links()}}</span>
                    </div>
                        <div class="col-md-6 mt-2">
                            <p class=" mt-2 btn-sm float-right">Showing {{$pasien->currentPage()}} - {{$pasien->lastPage()}} of {{$pasien->total()}}</p>
                        </div>
                    </td>
                </tr>
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

    window.addEventListener('alert', event => {
                Swal.fire({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.icon,
                    showConfirmButton: false,
                    timer: event.detail.timer,
                    buttons: false,
                });
      });
      window.addEventListener('editTutup', event => {
        $('#editDataPasien').modal('hide');
      });

</script>
