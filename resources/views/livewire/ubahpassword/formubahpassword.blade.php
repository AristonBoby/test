<div class="col-md-12 col-sm-12 col-lg-3">
    <div class="card card-default ">
        <div class="card-header">
            <h6 class="card-title">Ubah Password</h6>
        </div>
        <div class="card-body">
            <form wire:submit.prevent='resetpassword'> 
                @csrf

            <div class="form-group row" style="margin-bottom:5pt;">
                <label class="form-label col-md-12 col-sm-12 col-lg-5 text-xs">Nama</label>
                <div class="col-md-12 col-sm-12 col-lg-7">
                    <input type="text" class="form-control form-control-sm text-xs rounded-0" value="{{Auth::user()->name}}" disabled>
                </div>
            </div>
            <div class="form-group row" style="margin-bottom:5pt;">
                <label class="form-label col-md-12 col-sm-12 col-lg-5 text-xs">Email</label>
                <div class="col-md-12 col-sm-12 col-lg-7">
                    <input type="text" class="form-control form-control-sm ttext-xs rounded-0" value="{{Auth::user()->email}}" disabled>
                </div>
            </div>
            <div class="form-group row" style="margin-bottom:5pt;">
                <label class="form-label col-md-12 col-sm-12 col-lg-5 text-xs">Password Lama</label>
                <div class="col-md-12 col-sm-12 col-lg-7">
                    <input type="password" wire:model='password_lama'  class="form-control form-control-sm text-xs rounded-0 @error('password_lama')is-invalid @enderror">
                </div>
            </div>
            <div class="form-group row" style="margin-bottom:5pt;">
                <label class="form-label col-md-12 col-sm-12 col-lg-5 text-xs">Password Baru</label>
                <div class="col-md-12 col-sm-12 col-lg-7">
                    <input type="password" wire:model="password" class="form-control form-control-sm text-xs rounded-0  @error('password')is-invalid @enderror">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-label col-md-12 col-sm-12 col-lg-5 text-xs">Ulang Password Baru</label>
                <div class="col-md-12 col-sm-12 col-lg-7">
                    <input type="password" wire:model='re_password' class="form-control form-control-sm text-xs rounded-0 @error('re_password')is-invalid @enderror">
                    @error('re_password')<span class="invalid-feedback text-xs">{{$message}}</span> @enderror
                </div>
            </div>

            <div class="form-group row float-right" style="margin-right:2px;">
                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    window.addEventListener('logout', event => {
        Swal.fire({
            title: 'Perhatian',
            text: "Data Pasien Tersimpan",
            icon: 'success',
        })
    });
    window.addEventListener('editPasswordError', event => {
        Swal.fire({
            title: 'Perhatian',
            text: "Data Password yang Anda Masukan Tidak Sesuai",
            icon: 'danger',
        })
    });
</script>
