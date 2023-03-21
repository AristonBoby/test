<div class="col-lg-4 col-md-8 col-sm-12 btn-xs">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title"><b><i class="fa fa-edit text-sm"></i> Kunjungan</b> Pasien</h3>
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
                            <label class="col-md-4 col-sm-4 col-lg-4 text-sm ">NOMOR</label>
                            <div class="col-md-8 col-sm-8 col-lg-8 input-group input-group-sm">
                                <input autofocus type="text" class="form-control input-group-sm text-sm" wire:model.defer="cari" placeholder="Nomor RM / NIK / BPJS" required maxlength="16">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i> Cari</button>
                                    <button data-toggle="modal" data-target="#modalKunjunganCariPasien" type="button" class="btn btn-default btn-flat"> <b>...</b> </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-md-12 col-sm-12 col-lg-12">
                <form wire:submit.prevent='simpanKunjungan'>

                        <input type="hidden" wire.model='id_pasien'>
                        <div class="form-group row"style="margin-bottom:-1px;">
                            <label class="text-uppercase col-md-4 col-lg-4 col-sm-4 text-sm ">No Rekam Medis</label>
                            <label class="text-uppercase control-label text-sm col-sm-6 col-lg-6 col-md-6 ">{{$no_Rm}}</label>
                        </div>
                        <div class="form-group row"style="margin-bottom:-1px;">
                            <label class="text-uppercase col-md-4 col-lg-4 col-sm-4 text-sm ">Nama</label>
                            <label class="text-uppercase control-label text-sm col-sm-6 col-lg-6 col-md-6">{{$nama}}</label>
                        </div>
                        <div class="form-group row" style="margin-bottom:-1px;">
                            <label class="text-uppercase col-md-4 col-lg-4 col-sm-4 text-sm ">Tanggal Lahir</label>
                            <label class="text-uppercase control-label text-sm col-sm-6 col-lg-6 col-md-6">@if(!empty($tanggal_Lahir)){{\Carbon\Carbon::Parse($tanggal_Lahir)->format('d-m-Y') }} -- Umur
                                {{\Carbon\Carbon::Parse($tanggal_Lahir)->age }}@endif
                            </label>
                        </div>
                        <div class="form-group row" style="margin-bottom:-1px;">
                            <label class="text-uppercase control-label text-sm text-right col-sm-6 col-lg-12 col-md-6">
                                @if(\Carbon\Carbon::parse($tanggal_Lahir)->age >= 60 )
                                    <span class="badge badge-warning text-sm ml-2">Lansia</span>
                                @endif
                                @if($dm === '1')
                                    <span class="badge badge-danger text-sm ml-2">DIABETES MELITUS</span>
                                @endif
                                @if($dm === '1')
                                    <span class="badge badge-primary text-sm ml-2">HIPERTENSI</span>
                                @endif
                            </label>
                        </div>
                        <div class="form-group row" style="margin-bottom:-1px;">
                            <label class="text-uppercase col-md-4 col-lg-4 col-sm-4 text-sm ">NIK</label>
                            <label class="text-uppercase control-label text-sm col-sm-6 col-lg-6 col-md-6">{{$nik}}</label>
                        </div>
                        <div class="form-group row" style="margin-bottom:-1px;">
                            <label class="text-uppercase col-md-4 col-lg-4 col-sm-4 text-sm ">BPJS</label>
                            <label class="text-uppercase control-label text-sm col-sm-6 col-lg-6 col-md-6">{{$bpjs}}</label>
                        </div>
                        <div class="form-group row" style="margin-bottom:-1px;">
                            <label class="text-uppercase col-md-4 col-lg-4 col-sm-4 text-sm ">Telepon / HP</label>
                            <label class="text-uppercase control-label text-sm col-sm-6 col-lg-6 col-md-6">{{$no_tlpn}}</label>
                        </div>
                        <div class="form-group row"style="margin-top:12px;">
                            <label class="text-uppercase col-md-4 col-lg-4 col-sm-4 text-sm ">Tanggal Kunjungan</label>
                            <div class="input-group col-md-6">
                                <input readonly @disabled($form) type="text" value="{{$tanggal}}" onchange='Livewire.emit("tanggalKunjungan", this.value)' id="tglKunjungan" class="form-control " placeholder="dd-mm-yyyy" >
                                <span class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                    </span>
                                </span>
                            </div>

                        </div>
                        <div class=" text-uppercase form-group row" style="margin-top:-10px;">
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
                        <div class="text-uppercase form-group row" style="margin-top:-10px;">
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
                    <button type="submit" class="btn btn-sm btn-primary float-right text-xs" @disabled($form)><i class="fa fa-save text-xs"></i> Simpan</button>
                    <a href="" class="btn btn-sm btn-default float-right text-xs  mr-2" @disabled($form)><i class="fa fa-times text-xs"></i> Batal</a>
                </div>
            </div>
    </div>
</form>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script>
    window.addEventListener('alert', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.icon,
            showConfirmButton: false,
            timer: event.detail.timer,
            buttons: false,
        });
    });
</script>
<script>
    $(function () {
        $('#tglKunjungan').datepicker({
            format: "dd-mm-yyyy",
            autoclose:true,
            endDate: "dateToday",
        });
    });
</script>
