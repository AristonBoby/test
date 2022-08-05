<div wire:ignore.self class="modal modal fade" id="edituser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5 class=" text-center" style="margin-bottom:30px;">EDIT DATA USER</h5>
            <form class="form-horizontal">
              <div class="form-group row text-sm mt-10">
                <label class="form-label col-md-3">Nama</label>
                <div class="col-md-7">
                  <input type="text" wire:model="nama" class="form-control form-control-sm rounded-0">
                </div>
              </div>
              <div class="form-group row text-sm mt-10">
                <label class="form-label col-md-3">Email</label>
                <div class="col-md-7">
                  <input type="text" wire:model="email" class="form-control form-control-sm rounded-0">
                </div>
              </div>
              <div class="form-group row text-sm mt-10">
                <label class="form-label col-md-3">Role User</label>
                <div class="col-md-7">
                  <select wire:model="role" class="form-control form-control-sm rounded-0">
                    <option value="1">Pendaftaran</option>
                    <option value="2">Rekam Medis</option>
                    <option value="3">Dokter</option>
                    <option value="4">Admin</option>
                  </select>
                </div>
              </div>
              <div class="form-group row text-sm mt-10" wire:click="formedit">
                <label class="form-label col-md-3">Password</label>
                <div class="col-md-7">
                  <input type="password" @disabled($txtpass) class="form-control form-control-sm rounded-0">
                </div>
              </div>
              <div class="form-group row text-sm mt-10" wire:click="formedit">
                <label class="form-label col-md-3">Ulang Password</label>
                <div class="col-md-7">
                  <input type="password"  @disabled($txtpass) class="form-control form-control-sm rounded-0">
                </div>
              </div>
              <div class="form-group row text-sm mt-10">
                <label class="form-label col-md-3">Status</label>
                <div class="col-md-9">
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" wire:model='status'>
                      <label class="custom-control-label text-sm"> @if($status==1)<span class="badge bg-success">Aktif</span> @elseif($status==0) <span class="badge bg-danger">Tidak Aktif</span> @endif </label>
                  </div>
                  @error('status')<span class="invalid-feedback">{{$message}}</span>@enderror
              </div>
              </div>
              </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm text-white btn-warning btn-flat" wire:click="edit" data-dismiss="modal">Edit Data</button>
            <button type="button" class="btn btn-danger text-white btn-sm btn-flat" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>