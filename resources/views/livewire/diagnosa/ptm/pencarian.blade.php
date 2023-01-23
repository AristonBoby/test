<div class="col-lg-4 col-md-12 col-sm-12">  
    <div class="card card-warning card-outline">
        <div class="card-header">   
            <span class="card-title">Pencarian Data</span>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form wire:submit.prevent='cekpasien'>
                    <div class="form-group row">
                        <label class="col-md-4 text-md">Tanggal</label>
                        <div class="col-md-8 input-group input-group-md">
                            <input type="date" class="form-control input-group-md text-md @error('tanggal')is-invalid @enderror" wire:model.defer='tanggal'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 text-md">Nomor</label>
                        <div class="col-md-8 input-group input-group-md">
                            <input type="text" autofocus class="form-control input-group-md text-md @error('cari')is-invalid @enderror "wire:model.defer="cari" placeholder="Nomor RM / NIK / BPJS" required maxlength="16">
                                <span class="input-group-append">
                                    <button wire:click="cekpasien" type="button" class="btn btn-info"> Cari</button>
                                </span>
                                @error('cari')<span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                </form>
            </div>
          
            <div class="col-md-12">
                <div class="form-group row"style="margin-bottom:-10px;">
                    <label class="col-md-4 text-md col-form-label">REKAM MEDIS</label>
                    <label class="control-label text-md col-md-8 text-uppercase" ></label>
                </div>
                <div class="form-group row"style="margin-bottom:-10px;">
                    <label class="col-md-4 text-md col-form-label">Nama</label>
                    <label class="control-label text-md col-md-4"></label>
                </div>
                <div class="form-group row" style="margin-bottom:-10px;">
                    <label class="col-md-4 text-md col-form-label">TGL LAHIR</label>
                    <label class="control-label text-md col-md-8"></label>
                </div>
                <div class="form-group row" style="margin-bottom:-10px;">
                    <label class="col-md-4 text-md col-form-label">Jenkel</label>
                    <label class="control-label text-md col-md-8"></label>
                </div>
                <div class="form-group row" style="margin-bottom:-10px;">
                    <label class="col-md- text-md">NIK</label>
                    <label class="control-label text-md col-md-8"></label>
                </div>
            </div>
        </div>
    </div>
</div>