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
                  <input type="text" wire:model="nama" class="form-control form-control-sm rounded-0 @error('nama')is-invalid @enderror">
                  @error('nama')<span class="invalid-feedback">{{$message}}</span>@enderror
                </div>
              </div>
              <div class="form-group row text-sm mt-10">
                <label class="form-label col-md-3">Email</label>
                <div class="col-md-7">
                  <input type="text" wire:model="email" class="form-control form-control-sm rounded-0 @error('email')is-invalid @enderror" disabled>
                  @error('email')<span class="invalid-feedback">{{$message}}</span>@enderror
                </div>
              </div>
              <div class="form-group row text-sm mt-10">
                <label class="form-label col-md-3">Role User</label>
                <div class="col-md-7">
                  <select wire:model="role" class="form-control form-control-sm rounded-0 @error('role')is-invalid @enderror">
                    <option selected>Pilih Salah Satu</option>
                    <option value="1">Pendaftaran</option>
                    <option value="2">Rekam Medis</option>
                    <option value="3">Dokter</option>
                    <option value="4">Admin</option>
                  </select>
                  @error('role')<span class="invalid-feedback">{{$message}}</span>@enderror
                </div>
              </div>
              <div class="form-group row text-sm mt-10" wire:click="formedit">
                <label class="form-label col-md-3">Password</label>
                <div class="col-md-7">
                  <input type="password" wire:model="password" @disabled($txtpass) class="form-control form-control-sm rounded-0 @error('password')is-invalid @enderror">
                  @error('password')<span class="invalid-feedback">{{$message}}</span>@enderror
                </div>
              </div>
              <div class="form-group row text-sm mt-10" wire:click="formedit">
                <label class="form-label col-md-3">Ulang Password</label>
                <div class="col-md-7">
                  <input type="password" wire:model="re_password"  @disabled($txtpass) class="form-control form-control-sm rounded-0 @error('re_password')is-invalid @enderror">
                  @error('re_password')<span class="invalid-feedback">{{$message}}</span>@enderror
                </div>
              </div>
              <div class="form-group row text-sm mt-10">
                <label class="form-label col-md-3">Status</label>
                <div class="col-md-4">
                  <select class="form-control form-control-sm" wire:model="status">
                    <option value="1">Aktif</option>
                    <option value="0">Non Aktif</option>
                  </select>
                  @error('status')<span class="invalid-feedback">{{$message}}</span>@enderror
                </div>
              </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm text-white btn-warning btn-flat" wire:click="edit">Edit Data</button>
            <button type="button" class="btn btn-danger text-white btn-sm btn-flat" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    window.addEventListener('edituser', event => {
        Swal.fire({
            title: 'Berhasil',
            text: "Data Berhasil di Update",
            icon: 'success',
        })
    });
    
</script>
