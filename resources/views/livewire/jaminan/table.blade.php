<div class="col-md-4 col-lg-4 col-sm-12">
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Form Tambah Jenis Jaminan</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="simpan">
            <div class="form-group row">
                <label class="col-md-4 col-sm-12 col-lg-4 col-form-label">ID Jaminan</label>
                <div class="col-md-5 col-lg-7 col-sm-12">
                    <input wire:model.defer='id_jaminan' class="rounded-0 form-control form-control-md @error('id_jaminan')is-invalid @enderror">
                    @error('id_jaminan') <span class="invalid-feedback"> {{$message}} </span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">Nama Jaminan</label>
                <div class="col-md-5 col-lg-7 col-sm-12">
                    <input wire:model.defer='jaminan' class="form-control form-control-md rounded-0 @error('jaminan')is-invalid @enderror">
                    @error('jaminan') <span class="invalid-feedback"> {{$message}} </span> @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-sm-12 col-lg-4 col-form-label">Status Jaminan</label>
                <div class="col-md-5 col-lg-7 col-sm-12">
                    <select wire:model.defer='status' class="rounded-0 form-control form-control-md @error('jaminan')is-invalid @enderror">
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                    @error('status') <span class="invalid-feedback"> {{$message}} </span> @enderror
                </div>
            </div>
                <button class="btn btn-md btn-success btn-flat float-right">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
window.addEventListener('simpanjaminan', event=>{
    Swal.fire({
        title: 'Berhasil',
        text: "Data Pasien Berhasil Di Simpan",
        icon: 'success',
    })
});
window.addEventListener('gagalJaminan', event=>{
    Swal.fire({
        title: 'Warning',
        text: "Data Pasien Gagal Di Simpan",
        icon: 'Danger',
    })
});
</script>