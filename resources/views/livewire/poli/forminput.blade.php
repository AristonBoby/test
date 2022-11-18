<div class="col-md-12 col-lg-4 col-sm-12">
    <div class="card card-success card-outline">
        <div class="card-header">
            <form wire:submit.prevent='simpanpoli'>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="text-md col-md-4 col-form-label">Kode Poli</label>
                        <div class="col-md-7">
                            <input type="text" wire:model.defer='id_poli' class="form-control form-control rounded-0 number @error('id_poli')is-invalid @enderror" maxlength="2" placeholder="Kode Poli">
                            @error('id_poli') <span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group row" >    
                        <label class="text-md col-md-4 col-from-label">Nama Poli</label>
                        <div class="col-md-7">
                            <input type="text" wire:model.defer="namapoli" class="form-control rounded-0 @error('namapoli')is-invalid @enderror" placeholder="Nama Poli">
                            @error('namapoli')<span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group row" >    
                        <label class="text-md col-md-4 col-from-label">Status</label>
                        <div class="col-md-7">
                           <select class="form-control rounded-0" wire:model.defer='status'>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                           </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-sm btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
            </form>
        </div>
        
    </div>
</div>
<script>
 window.addEventListener('simpanBerhasil', event => {
        Swal.fire({
            title: 'Berhasil',
            text: "Data Berhasil Disimpan",
            icon: 'success',
        })
    });

</script>