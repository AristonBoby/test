<div class="card card-warning card-outline ">
    <div class="card-header">
        <h3 class="card-title"><b>Pendaftaran </b>Pasien</h3>
    </div>
    <div class="card-body">
        <div class="col-md-12 col-sm-12 mb-1 col-lg-12">
            <span class="text-danger">* Pendaftaran Pasien PTM</span><br>
        </div>
        <form class="form-horizontal" wire:submit.prevent='cek_ptm'>
            <div class="form-group row">
                <label class="text-sm form-control-label col-md-2 col-sm-2 col-lg-2">NIK</label>
                <div class="col-md-10 col-lg-10 col-sm-10">
                    <input type="text" maxlength="16" class=" form-control rounded-0 form-control-sm @error('cari')is-invalid @enderror" wire:model.defer='cari' placeholder="NIK">
                    @error('cari') <span class="text-sm invalid-feedback">{{$message}}</span> @enderror
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
