<div class="card card-primary text-sm card-outline">
    <div class="card-header">
        <h5 class="card-title"><b><i class="fa fa-edit text-sm"></i> Pendaftaran</b> Pasien</h5>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form class="form-horizontal" wire:submit.prevent='cekPasien'>
            <span class="text-danger">* Untuk Mendaftar Pasien Baru Masukan NIK Pasien</span><br>
            <span class="text-danger">* Untuk Cek Data Pasien Telah Terinput Masukan NIK</span><br>
            <span class="text-danger">* Jika Pasien Tidak Memiliki NIK Pilih Tombol <b><a class="btn btn-warning btn-xs">+ Tidak Memiliki NIK </a> </br>Khusus Pasien Di bawah 5 < Tahun </b></span>
            <div class="form-group row mt-4">
                <label class="form-label col-md-2 col-sm-2 col-lg-2">NIK</label>
                <div class="col-md-8 col-sm-8 col-lg-8">
                    <input type="text" wire:model.defer="nik" maxlength="16" class="form-control form-control-sm number @error('nik') is-invalid @enderror" maxlength="16" placeholder="Masukan NIK Pasien">
                    @error('nik')<span class="invalid-feedback">{{$message}}</span>@enderror
                </div>
            </div>
            <div>
                <button wire:click="tanpaNIK" type="button" class="btn btn-warning btn-sm float-left" ><b>+ Tidak Memiliki NIK</b></button>
                <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-search"></i> Cek</button>
            </div>
        </form>
    </div>
</div>

