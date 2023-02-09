<div class="card card-primary text-sm card-outline">
    <div class="card-header">
        <h5 class="card-title"><b>Pendaftaran</b> Pasien</h5>
    </div>
    <div class="card-body">
        <form class="form-horizontal" wire:submit.prevent='cekPasien'>
            <span class="text-danger">* Untuk Cek Data Pasien Telah Terinput Masukan NIK</span><br>
            <span class="text-danger">* Jika Pasien Tidak Memiliki NIK Pilih Tombol <b>Tidak Memiliki NIK</b></span>
            <div class="form-group row mt-4">
                <label class="form-label col-md-2 col-sm-2 col-lg-2">NIK</label>
                <div class="col-md-8 col-sm-8 col-lg-8">
                    <input type="text" wire:model.defer="nik" maxlength="16" class="form-control form-control-sm " placeholder="Masukan NIK Pasien">
                </div>
            </div>
            <div>
                <button wire:click="tidakAdaNik" type="button" class="btn btn-warning btn-sm float-left" ><b>+</b> Tidak Memiliki NIK</button>
                <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-search"></i> Cek</button>
            </div>
        </form>
    </div>
</div>

