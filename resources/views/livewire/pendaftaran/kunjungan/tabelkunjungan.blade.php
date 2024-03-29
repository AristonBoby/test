<div class="col-md-12 col-sm-12 col-lg-12">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h5 class="card-title"><b><i class="fa fa-table text-sm"></i> Data Kunjungan</b> Pasien</h5>
            <div wire:loading>
                <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
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
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <p class="text-sm text-danger">* Data kunjungan yang ditampilkan berdasarkan tanggal kunjungan</p>
                </div>
                <div class="form-group float-left col-md-8col-sm-8 col-lg-8">
                    <div class="col-md-12 col-lg-4 col-sm-12 float-right row">
                        <label class="form-label col-md-3 col-sm-3 col-lg-4 text-sm"> Tanggal</label>
                            <div class="input-group col-md-4 col-lg-8 col-sm-4 mb-3">
                                <span class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                    </span>
                                </span>
                                <input type="text"  id="tableKunjungan" readonly onchange="Livewire.emit('tblKunjungan',this.value)" value="{{$tanggal}}" class=" form-control form-control-sm">
                                <span class="input-group-append">
                                    <button class="btn btn-primary btn-sm" wire:click='render'><i class="fa fa-search text-xs"></i> Cari</button>
                                </span>
                            </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class=" table  table-hover text-sm  text-center table-sm">
                    <thead class="text-uppercase">
                        <tr>
                            <th class=" ">No</th>
                            <th class="text-center">No Rekam Medis</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Umur</th>
                            <th class="text-center">Kelamin</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">BPJS</th>
                            <th class="text-center">Poli</th>
                            <th class="text-center">Jaminan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody  wire:loading.remove class="text-uppercase">
                        @if($query->count() === 0)
                            <tr>
                                <td colspan='11' class="text-center">Data Kunjungan Kosong <i class="fa fa-database text-xs"></i></td>
                            </tr>
                        @endif
                        @foreach ($query as $no => $data)
                            <tr  style="@if(\Carbon\Carbon::parse($data->tanggal_Lahir)->age >= 60)  background-color:#ffffd6 @endif">
                                <td>{{$query->firstItem() + $no}}.</td>
                                <td>{{$data->no_Rm}}</td>
                                <td class="text-left">{{$data->nama}}</td>
                                <td>{{\Carbon\Carbon::parse($data->tanggal_Lahir)->format('d-m-Y')}}</td>
                                <td>{{\Carbon\Carbon::parse($data->tanggal_Lahir)->age }}</td>
                                <td>{{$data->jenkel}}</td>
                                <td>{{$data->nik}}</td>
                                <td>{{$data->bpjs}}</td>
                                <td>{{$data->nama_poli}}</td>
                                <td>{{$data->jaminan}}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger text-xs" wire:click="konfirmasihapus({{$data->id}})"><i class="fas fa-light fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <div class=" text-sm btn-flat btn-xs">
                            <div class="col-lg-12 col-md-12 col-sm-12 row">
                                <tr>
                                    <td colspan="3">
                                            <div class="mt-3 col-md-12 col-sm-12">
                                                <p class=" text-left text-sm col-lg-12 col-md-12 col-sm-12">Showing {{$query->currentPage()}} - {{$query->lastPage()}} of {{$query->total()}}</p>
                                            </div>
                                    </td>
                                    <td colspan='8'>
                                        <div class="col-lg-12 col-md-12 col-sm-12" >
                                            <div class="float-right mt-3">
                                                <span>{{$query->links()}}</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </div>
                        </div>
                    </tfoot>
                </table>
            </div>
        </div>

        </div>
    </div>
</div>
    <style>
        nav svg{
            height:20px;
        }
    </style>
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
  <script>
    $(function () {
        $('#tableKunjungan').datepicker({
            format: "dd-mm-yyyy",
            locale:'id',
            autoclose:true,
            endDate: "dateToday",
        });
    });
</script>
