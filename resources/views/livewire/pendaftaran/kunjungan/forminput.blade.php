<div class="col-lg-4 col-md-8 col-sm-12 btn-xs">   
    <div class="card card-warning card-outline">
        <div class="card-header">
            <h3 class="card-title"><b>Input Kunjungan</b> Pasien</h3>
            <div wire:loading>
                <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
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
                <form wire:submit.prevent='cekpasien'>
                    @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-4 col-sm-4 col-lg-4 text-sm ">No</label>
                            <div class="col-md-8 col-sm-8 col-lg-8 input-group input-group-sm">
                                <input type="text" class="form-control input-group-sm text-sm" wire:model.defer="cari" placeholder="Nomor RM / NIK / BPJS" required maxlength="16">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-info btn-flat">Cari</button>
                                    <button data-toggle="modal" data-target="#modalKunjunganCariPasien" type="button" class="btn btn-default btn-flat"> <b>...</b> </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-md-12 col-sm-12 col-lg-12">
                <form wire:submit.prevent='simpanKunjungan'>
                    @csrf
                        <input type="hidden" wire.model='id_pasien'>
                        <div class="form-group row"style="margin-bottom:-7px;">
                            <label class="col-md-4 col-lg-4 col-sm-4 text-sm ">No Rekam Medis</label>
                            <label class="control-label text-sm col-sm-6 col-lg-6 col-md-6 ">{{$no_Rm}}</label>
                        </div>
                        <div class="form-group row"style="margin-bottom:-7px;">
                            <label class="col-md-4 col-lg-4 col-sm-4 text-sm ">Nama</label>
                            <label class="control-label text-sm col-sm-6 col-lg-6 col-md-6">{{$nama}}</label>
                        </div>
                        <div class="form-group row" style="margin-bottom:-7px;">
                            <label class="col-md-4 col-lg-4 col-sm-4 text-sm ">Tanggal Lahir</label>
                            <label class="control-label text-sm col-sm-6 col-lg-6 col-md-6">{{$tanggal_Lahir}}</label>
                        </div>
                        <div class="form-group row" style="margin-bottom:-7px;">
                            <label class="col-md-4 col-lg-4 col-sm-4 text-sm ">NIK</label>
                            <label class="control-label text-sm col-sm-6 col-lg-6 col-md-6">{{$nik}}</label>
                        </div>
                        <div class="form-group row" style="margin-bottom:-7px;">
                            <label class="col-md-4 col-lg-4 col-sm-4 text-sm ">BPJS</label>
                            <label class="control-label text-sm col-sm-6 col-lg-6 col-md-6">{{$bpjs}}</label>
                        </div>
                        <div class="form-group row" style="margin-bottom:-7px;">
                            <label class="col-md-4 col-lg-4 col-sm-4 text-sm ">Telepon / HP</label>
                            <label class="control-label text-sm col-sm-6 col-lg-6 col-md-6">{{$no_tlpn}}</label>
                        </div>
                        <div class="form-group row"style="margin-top:12px; ">
                            <label class="col-md-4 col-lg-4 col-sm-4 text-sm ">Tanggal Kunjungan</label>
                            <div class="col-md-6">
                                <input type="date"  wire:model='tanggal' class="form-control form-control-sm rounded-0" required @disabled($form) >
                            </div>
                        </div>
                        <div class="form-group row" style="margin-top:-10px;">
                            <label class="form-control-label text-sm col-md-4 ">Jenis Kunjungan</label>
                            <div class="col-md-6">
                                <select @disabled($form) class="form-control form-control-sm text-sm rounded-0  @error('jeniskunjungan') is-invalid @enderror" wire:model.defer="jeniskunjungan">
                                    <option value="" selected> --Pilih Salah Satu--</option>
                                    @foreach ($jaminans as $data)
                                        <option value="{{$data->id_jaminan}}">{{$data->jaminan}}</option>
                                    @endforeach
                                </select>
                                @error("jeniskunjungan")<span class="invalid-feedback text-xs">{{$message}}</span> @enderror
                            </div>
                        </div> 
                        <div class="form-group row" style="margin-top:-10px;">
                            <label class="form-control-label text-sm col-md-4 ">Poli</label>
                            <div class="col-md-6">
                                <select class="form-control form-control-sm text-sm rounded-0 @error('poli') is-invalid @enderror" wire:model.defer="poli" @disabled($form) >
                                    <option selected>Pilih Poli</option>
                                    @foreach ($pilihpoli as $polis )
                                        @if($polis->status === '1')
                                        <option value="{{$polis->id_poli}}">{{$polis->nama_poli}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error("poli")<span class="invalid-feedback text-xs">{{$message}}</span> @enderror
                            </div>
                        </div> 
                    <button type="submit" class="btn btn-sm btn-primary float-right text-xs" @disabled($form)><i class="far fa-save text-xs"></i> Simpan</button> 
                </div>
            </div>
    </div>
</form>
    </div>
</div>
<script>
window.addEventListener('dataTidakDitemukan', event => {
    Swal.fire({
        title: 'Perhatian',
        text: "Data Pasien tidak ditemukan",
    })
});
window.addEventListener('kunjunganBerhasil', event => {
    Swal.fire({
        title: 'Perhatian',
        text: "Data Pasien Tersimpan",
        icon: 'success',
    })
});
window.addEventListener('kunjunganganda', event => {
    Swal.fire({
        title: 'Perhatian',
        text: "Pasien Telah di Entri pada hari yang sama dan Poli yang sama",
        icon: 'warning',
    })
});

</script>