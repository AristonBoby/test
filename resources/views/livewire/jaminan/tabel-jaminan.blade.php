<div class="col-md-8 col-lg-8 col-sm-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Tabel Data</b> Jaminan</h5>
            <div wire:loading>
                <span class="badge bg-success text-xs "style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
        </div>
        <div class="card-body">
               <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class=" nav-link text-white @if($halaman===1)active @endif btn-info btn-flat btn-xs btn" wire:click="pilihHalaman(1)" data-toggle="tab" href="#dataJaminan" data-toggle><i class="fa fa-hdd  text-xs"></i>  Data Jaminan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white @if($halaman===2)active @endif btn-flat btn btn-danger btn-xs" wire:click="pilihHalaman(2)" data-toggle="tab" href="#dataJaminanHapus"> <i class="fas fa-light fa-trash-alt text-xs"></i> Riwayat Jaminan Terhapus</a>
                    </li>
                </ul>
            <div class="tab-content row">
                <div class="col-md-12 col-sm-12 col-lg-12 mt-3">
                    <div class="col-md-12">
                        @if($halaman===2) <code class="text-sm">* Data yang ditampilkan merupakan data jaminan yang telah dihapus</code> @endif
                        @if($halaman===1) <code class="text-sm">* Data yang dihapus dapat dibatalkan pada menu Riwayat Jaminan Terhapus</code> @endif
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12 mb-1 mt-" style="margin-top:-30px; ">
                    <button wire:click='render()' class="btn btn-primary float-right btn-sm text-xs btn-flat"><i class=" text-xs fa fa fa-sync-alt"></i> Refresh</button>
                </div>
                <div class="tab-pane table-responsive @if($halaman===2)active @endif" id="dataJaminanHapus">
                    <table class="table table-sm table-bordered text-sm table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="8">No</th>
                                <th width="800">Jaminan</th>
                                <th width="80" class="text-center">Status</th>
                                <th width="5">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataHapus as $no=>$data)
                            <tr>
                                <td  class="text-center">{{$jaminan->firstItem()+$no}}.</td>
                                <td >{{$data->jaminan}}</td>
                                <td class="text-center">@if ($data->status == '3')
                                        <span class="badge bg-danger">Data telah dihapus</span>
                                    @endif
                                    </td>
                                <td>
                                    <div class="btn-group btn-xs">
                                        <a class="btn btn-sm bg-warning" wire:click="restore({{$data->id_jaminan}})"><i class="fas fa-light fa-undo-alt text-xs"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5 float-right">{{$jaminan->links()}}</div>
                </div>


                <div class="tab-pane col-lg-12 col-sm-12 col-md-12 @if($halaman===1)active @endif" id="dataJaminan">
                    <table class="table table-sm table-bordered text-sm table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="8">No</th>
                                <th width="800">Jaminan</th>
                                <th width="80" class="text-center">Status</th>
                                <th width="5"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jaminan as $no=>$data)
                            <tr>
                                <td  class="text-center">{{$jaminan->firstItem()+$no}}.</td>
                                <td >{{$data->jaminan}}</td>
                                <td class="text-center">
                                    @if ($data->status == '1')
                                        <span class="badge bg-success">Aktif</span>
                                    @elseif($data->status=='2')
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                    @endif
                                    </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-warning "  data-toggle="modal"  wire:click="cariData('{{$data->id_jaminan}}')" data-target="#modalEditJaminan"><i class="text-xs fa fa-edit"></i></a>
                                        <a class="btn btn-sm bg-danger" wire:click="hapusKunjungan({{$data->id_jaminan}})"><i class="fas fa-light fa-trash-alt text-xs"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5 float-right">{{$jaminan->links()}}</div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.jaminan.modalEdit')
</div>

<script>
    window.addEventListener('berhasil', event => {
             Swal.fire({
             title: event.detail.title,
             text : event.detail.text,
             icon : event.detail.icon,
             confirmButtonColor:'#5cb85c',
             confirmButtonText:event.detail.btnTxt,

           })
     });

     window.addEventListener('konfirmasihapus', event => {
                  Swal.fire({
                  title: event.detail.title,
                  text: event.detail.text,
                  icon: event.detail.icon,
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
    window.addEventListener('edit', event => {
                  Swal.fire({
                  title: event.detail.title,
                  text: event.detail.text,
                  icon: event.detail.icon,
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                  cancelButtonText : 'Tidak',
                  confirmButtonText: 'YA',
                }).then((result) => {
                  if (result.isConfirmed) {
                      Livewire.emit('restoreKunjungan')
                  }
                })
          });
</script>
