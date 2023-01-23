<div class="card card-warning card-outline">
    <div class="card-header">
        <h3 class="card-title"><b>Pencarian</b> Data</h3>
    </div>
    <div class="card-body">
        <div class="col-md-12 col-sm-12 mb-1 col-lg-12 text-center">
            <span class="text-danger">* Pencarian Data Melalui Database Pasien Berobat</span><br>
            <span class="text-danger">* Jika Pasien Tidak Ditemukan Pada Database Pasien, Data di Input Secara Manual</span>

        </div>
        <form class="form-horizontal" wire:submit.prevent='cek_ptm'>
            <div class="form-group row">
                <label class=" col-md-2 col-sm-2 text-sm col-lg-2">NIK</label>
                <div class="col-md-10 col-lg-10 col-sm-10">
                    <input type="text" maxlength="16" class="text-sm form-control form-control-sm rounded-0 @error('cari')is-invalid @enderror" wire:model.defer='cari' placeholder="Masukan NIK">
                    
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-search"></i> Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>
