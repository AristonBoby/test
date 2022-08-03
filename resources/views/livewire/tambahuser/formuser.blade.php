<div class="col-lg-4">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">Form Tambah User</h5>
        </div>
        <div class="card-body">
            <form class="form-horizontal" wire:submit.prevent='simpanuser'>
                <div class="form-group row">
                    <label class="text-sm form-label col-md-3">Email</label>
                    <div class="col-md-9">
                        <input type="email" wire:model='email' class="form-control-sm form-control rounded-0" placeholder="Masukan Email User" maxlength="30">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="text-sm form-label col-md-3">Nama</label>
                    <div class="col-md-9">
                        <input type="text" wire:model='nama' class="form-control-sm form-control rounded-0 @error('nama')is-invalid @enderror" placeholder="Masukan Nama User" maxlength="30">
                        @error('nama')<span class="invalid-feedback text-sm">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="text-sm form-label col-md-3">Kategori</label>
                    <div class="col-md-9">
                        <select wire:model='role' class="form-control text-sm form-control-sm">
                            <option value="1">Pendaftaran</option>
                            <option value="2">Rekam Medis</option>
                            <option value="3">Admin</option>
                            <option value="4">Dokter</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="text-sm form-label col-md-3">Password</label>
                    <div class="col-md-9">
                        <input type="password" wire:model='password' class="form-control-sm form-control rounded-0" placeholder="Masukan Nama User" maxlength="20">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="text-sm form-label col-md-3">Ulangi Password</label>
                    <div class="col-md-9">
                        <input type="password" wire:model='re_password' class="form-control-sm form-control rounded-0" placeholder="Masukan Nama User" maxlength="20">
                    </div>
                </div>
                <div class="form-group row">
                <label class="col-md-3 text-sm">Status User</label>
                <div class="col-md-9">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" class="custom-control-input" wire:model='status_user' id="customSwitch3">
                        <label class="custom-control-label text-sm" for="customSwitch3">Status User Aktif / Tidak Aktif</label>
                    </div>
                </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-primary btn-flat float-right">Simpan</button>
                    </div>
                </div>
            </form>  
        </div>
    </div>
</div>