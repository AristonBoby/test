<div class="col-lg-4">
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h5 class="card-title">Form Tambah User</h5>
            <div wire:loading>
                <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>            
        </div>
        <div class="card-body">
            <form class="form-horizontal" wire:submit.prevent='simpanuser'>
                @csrf
                <div class="form-group row" style="margin-bottom:7px;">
                    <label class="text-sm form-label col-md-3">Email</label>
                    <div class="col-md-9" wire:click.defer='validasiinputan("email")' >
                        <input type="email" @disabled($txtemail) wire:model.defer='email' class="form-control-sm form-control rounded-0 @error('email') is-invalid @enderror" placeholder="Masukan Email User" maxlength="30">
                        @error('email')<span class="invalid-feedback">{{$message}}</span>@enderror
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom:7px;">
                    <label class="text-sm form-label col-md-3">Nama</label>
                    <div class="col-md-9" wire:click='validasiinputan("nama")'>
                        <input type="text" wire:model.defer='nama'  @disabled($txtnama) class="form-control-sm form-control rounded-0 @error('nama')is-invalid @enderror" placeholder="Masukan Nama User" maxlength="30">
                        @error('nama')<span class="invalid-feedback text-sm">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="form-group row" style="margin-bottom:7px;">
                    <label class="text-sm form-label col-md-3">Role User</label>
                    <div class="col-md-9">
                        <select wire:model.defer='role' class="@error('role')is-invalid @enderror form-control text-sm form-control-sm">
                            <option selected>--Pilih Salah Satu --</option>
                            <option value="1">Pendaftaran</option>
                            <option value="2">Rekam Medis</option>
                            <option value="3">Dokter</option>
                            <option value="4">Admin</option>
                        </select>
                        @error('role')<span class="invalid-feedback text-sm">{{$message}}</span>@enderror
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom:7px;">
                    <label class="text-sm form-label col-md-3">Password</label>
                    <div class="col-md-9">
                        <input type="password" wire:model.defer='password' class="form-control-sm form-control rounded-0 @error('password') is-invalid @enderror" placeholder="Masukan Nama User" maxlength="20">
                        @error('password')<span class="invalid-feedback">{{$message}}</span>@enderror
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom:7px;">
                    <label class="text-sm form-label col-md-3">Ulangi Password</label>
                    <div class="col-md-9">
                        <input type="password" wire:model.defer='re_password' class="form-control-sm form-control rounded-0 @error('re_password') is-invalid @enderror" placeholder="Masukan Nama User" maxlength="20">
                        @error('re_password')<span class="invalid-feedback text-sm">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="form-group row" style="margin-bottom:7px;">
                <label class="col-md-3 text-sm">Status User</label>
                <div class="col-md-9">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" class="custom-control-input" wire:model.defer='status_user' id="customSwitch3">
                        <label class="custom-control-label text-sm" for="customSwitch3">Status User Aktif / Tidak Aktif</label>
                    </div>
                    @error('status_user')<span class="invalid-feedback">{{$message}}</span>@enderror
                </div>
                </div>
                <div class="form-group row"style="margin-bottom:7px;">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-primary btn-flat float-right">Simpan</button>
                    </div>
                </div>
            </form>  
        </div>
    </div>
</div>
<script>
    window.addEventListener('success', event => {
        Swal.fire({
            title: 'Perhatian',
            text: "Data Pasien Tersimpan",
            icon: 'success',
        })
    });
    
</script>