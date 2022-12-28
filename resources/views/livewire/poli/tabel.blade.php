<div class="col-lg-8">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Tabel Data</b> Poli</h5>
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
            <div class="col-md-12">
                <form class="form-horizontal">
                    <div class="row mb-3 float-right">
                       <button class="btn btn-info btn-flat btn-xs text-sm" wire:click.prevent="render"><i class=" text-xs fa fa fa-sync-alt"></i> Refresh</button>
                    </div>
                </form>
            </div>
            <div>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class=" nav-link text-white  btn-info btn-flat btn-xs btn" wire:click="halaman(1)" data-toggle="tab" href="#dataHapus" data-toggle><i class="fa fa-hdd  text-xs"></i>  Data Jaminan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white  btn-flat btn btn-danger btn-xs" wire:click="halaman(2)" data-toggle="tab" href="#dataHapus"> <i class="fas fa-light fa-trash-alt text-xs"></i> Riwayat Terhapus</a>
                    </li>
                </ul>
                <div class="col-md-12 mt-2 mb-2">
                    @if($var_halaman===1) <code class="text-sm">* Data yang dihapus dapat dibatalkan pada menu Riwayat Terhapus</code> @endif
                    @if($var_halaman===2) <code class="text-sm">* Data pasien yang terhapus </code> @endif
                </div>
                <div class="tab-content row">
                    <div class="tab-pane table-responsive @if($var_halaman===1)active @endif" id="dataHapus">
                        <table style="margin-top:10;margin-bottom:-10" class="table-striped table table-sm  table-hover text-sm table-bordered">
                            <thead>
                                <tr>
                                    <th width="20px">Status</th>
                                    <th>Nama Poli</th>
                                    <th width="10">Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                @if($query->isEmpty())
                                <tr>
                                    <td colspan=4>Data Kosong</td>
                                </tr>
                                @endif
                                @foreach ($query as $index => $data)
                                @if($data->status==1 || $data->status==2)
                                    <tr>
                                        @if($data->status==1)
                                            <td><span class="badge bg-success">Aktif</span></td>
                                        @elseif($data->status==2)
                                            <td><span class="badge bg-warning">Tidak Aktif</span></td>
                                        @endif
                                        <td>{{$data->nama_poli}}</td>
                                        <td width="80">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-warning"  data-toggle="modal" wire:click='detailPoli({{$data->id_poli}})' data-target="#EditPoli"><i class="text-xs fa fa-edit"></i></a>
                                                <a class="btn btn-sm btn-danger" wire:click='confirmHapus({{$data->id_poli}})'><i class="text-xs fas fa-light fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                            </tbody>                    
                        </table>
                    </div>
                    <div class="tab-pane table-responsive @if($var_halaman===2)active @endif" id="dataHapus">
                        <table style="margin-top:10;margin-bottom:-10" class="table-striped table table-sm  table-hover text-sm table-bordered">
                            <thead>
                                <tr>
                                    <th width="20px">Status</th>
                                    <th>Nama Poli</th>
                                    <th width="5">Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                @if($query->isEmpty())
                                <tr>
                                    <td colspan=4>Data Kosong</td>
                                </tr>
                                @endif
                                @foreach ($query as $index => $data )
                                    @if($data->status==3)
                                        <tr>
                                            @if($data->status==3)
                                                <td><span class="badge bg-danger">Hapus</span></td>
                                            @endif
                                            <td>{{$data->nama_poli}}</td>
                                            <td width="80">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-warning"  wire:click='restorePoli({{$data->id_poli}})'><i class="text-xs fa fa-undo"></i></a>
                                            </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>                      
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>       <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="EditPoli" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><b>Form Edit</b> Poli</h5>
                <div wire:loading>
                    <span class="badge bg-success text-sm" style="margin-left:5px;"> <i class="text-sm fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" wire:submit.prevent='update_poli()' >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label text-sm">Kode Poli</label>
                                        <div class="col-md-9">
                                            <input type="text"  class="form-control" wire:model.defer="idPoli" id="recipient-name" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label text-sm">Nama Poli</label>
                                        <div class="col-md-9">
                                            <input type="text" wire:model.defer="namaPoli"  class="form-control" id="recipient-name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label text-sm">Status</label>
                                        <div class="col-md-9">
                                        <select class="form-control" wire:model.defer="status" required>
                                            <option value="">=== Pilih Salah Satu ===</option>
                                            <option value="1">Aktif</option>
                                            <option value="2">Tidak Aktif</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
              </div>
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-info btn-sm text-sm "><i class=" fas fa-edit text-xs"></i> Edit</button>
                <button type="button" class="btn btn-danger btn-sm text-sm " data-dismiss="modal"><span class="text-xs fa fa-times"></span> Batal</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    
</div>

<script>
     window.addEventListener('Edit', event => {
              Swal.fire({
              title: event.detail.title,
              text : event.detail.text,
              icon : event.detail.icon,
              confirmButtonColor:'#5cb85c',
              confirmButtonText:event.detail.btnTxt,
             
            })
      });
      window.addEventListener('confirmHapus', event => {
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
                      Livewire.emit('hapusPoli')
                  }
                })
          });
          window.addEventListener('restorePoli', event => {
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
                      Livewire.emit('poliRestore')
                  }
                })
          });
</script>