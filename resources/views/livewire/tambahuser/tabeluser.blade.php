<div class="col-lg-8">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Form Tambah</b> User</h5>
            <div wire:loading>
                <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>               
        </div>
        <div class="card-body">
            <div class="col-md-8">
                <span class="text-sm text-danger">*User yang sudah tidak digunakan harus di nonaktikan</span>
            </div>
            <div class="input-group mb-3 col-lg-4 col-sm-12 float-right">
                <div class="input-group-prepend">
                    <span class="input-group-text btn-sm text-xs"><b>Cari</b></span>
                </div>
                    <input type="text" class="form-control form-control-sm" wire:model='cari' placeholder="Cari User">
            </div>
           <table class="table table-bordered table-striped table-sm table-hover text-xs mb-2 text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role User</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $key=>$query )
                    <tr>
                        <td>{{$user->firstItem()+$key}}.</td>
                        <td class="text-left">{{$query->name}}</td>
                        <td class="text-left">{{$query->email}}</td>

                        <td>
                            @if($query->role == '1')
                                    Pendaftaran
                            @elseif($query->role == '2')
                                    Rekam Medis
                            @elseif($query->role == '3')
                                    Dokter
                            @elseif($query->role == '4')
                                    Admin
                            @endif
                        </td>
                        <td class="text-sm">@if($query->status_user=='0')
                                    <span class="badge bg-danger">Tidak Aktif</span>
                            @elseif($query->status_user=='1')
                                    <span class="badge bg-success">Aktif</span>
                            @endif   
                        </td>
                        <td >
                            <div class="btn-group"> 
                                <a class="btn btn-sm btn-warning" data-toggle="modal" wire:click="$emit('edituser',{{$query->id}})" data-target="#edituser"><i class="text-xs fa fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger " wire:click="konfirmasihapususer('{{$query->id}}')"><i class="text-xs fas fa-light fa-trash-alt"></i></a>
                            </div>
                           
                        </td>
                    </tr>
                    @endforeach
                </tbody>
           </table>
        </div>
        <div class="card-footer">
            <div class="float-left text-xs">
                {{$user->links()}}
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('konfirmasihapususer', event => {
                  Swal.fire({
                  title: 'Hapus?',
                  text: "Apakah anda ingin menghapus User ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                  confirmButtonText: 'YA'
                }).then((result) => {
                  if (result.isConfirmed) {
                      Livewire.emit('hapususer')
                  }
                })
    });

    window.addEventListener('berhasil', event => {
        Swal.fire({
            title: 'Berhasil',
            text: "Data User Berhasil di Update",
            icon: 'success',
        })
    });
</script>