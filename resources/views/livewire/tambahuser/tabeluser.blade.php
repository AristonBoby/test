<div class="col-lg-8">
    <div class="card card-info">
        <div class="card-header">
            <h5 class="card-title">Form Tambah User</h5>
        </div>
        <div class="card-body">
            <div class="col-md-8">
                <span class="text-sm text-danger">*User yang sudah tidak digunakan harus di nonaktikan</span>
            </div>
            <div class="col-md-4 row float-right mb-4">
                <label class="form-label text-sm col-md-3">Cari User</label>
                <input type="text" class="col-md-7 form-control form-control-sm rounded-0" wire:model='cari'>
                <button class="btn btn-sm btn-primary btn-flat">Cari</button>
            </div>
           <table class="table table-bordered table-sm table-hover text-xs mb-2 text-center">
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
                        <td>{{$user->firstItem()+$key}}</td>
                        <td>{{$query->name}}</td>
                        <td>{{$query->email}}</td>

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
                            <a class="btn btn-xs btn-warning" data-toggle="modal" wire:click="$emit('edituser',{{$query->id}})" data-target="#edituser"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-xs btn-danger "><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
           </table>
        </div>
        <div class="card-footer">
            <div class="float-right">
                {{$user->links()}}
            </div>
        </div>
    </div>
</div>