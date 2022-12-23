<div class="col-md-4 col-lg-4 col-sm-12">
    <div class="card card-warning card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Form Tambah </b> Jaminan</h5>
            <div wire:loading>
                <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="simpan">
            <div class="form-group row" style="margin-bottom: 5px;">
                <label class="col-md-4 col-sm-12 col-lg-4 col-form-label text-sm">ID Jaminan</label>
                <div class="col-md-5 col-lg-7 col-sm-12">
                    <input maxlength="2" wire:model.defer='id_jaminan' class="rounded-0 form-control form-control-sm @error('id_jaminan')is-invalid @enderror">
                    @error('id_jaminan') <span class="invalid-feedback"> {{$message}} </span> @enderror
                </div>
            </div>
            <div class="form-group row" style="margin-bottom: 5px;">
                <label class="col-md-4 col-form-label text-sm" >Nama Jaminan</label>
                <div class="col-md-5 col-lg-7 col-sm-12 text-sm">
                    <input  maxlength="25" wire:model.defer='jaminan' class="form-control form-control-sm rounded-0 @error('jaminan')is-invalid @enderror">
                    @error('jamin') <span class="invalid-feedback"> {{$message}} </span> @enderror
                </div>
            </div>
            <div class="form-group row text-xs" style="margin-bottom:5px;">
                <label class="col-md-4 col-sm-12 col-lg-4 col-form-label text-sm">Status Jaminan</label>
                <div class="col-md-5 col-lg-7 col-sm-12">
                    <select wire:model.defer='status' class=" rounded-0 form-control form-control-sm  @error('jaminan')is-invalid @enderror">
                        <option value="0">Aktif</option>
                        <option value="1">Tidak Aktif</option>
                    </select>
                    @error('status') <span class="invalid-feedback"> {{$message}} </span> @enderror
                </div>
            </div>
                <button class="btn btn-md btn-primary  btn-sm float-right" style="margin-top:5px;">Simpan</button>
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