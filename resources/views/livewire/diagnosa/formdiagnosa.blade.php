<div class="col-lg-4 col-md-12 col-sm-12">
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h3 class="card-title">Input Diagnosa Penyakit</h3>
            <div wire:loading>
                <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-sm fas fa fa-spinner fa-spin"></i> &nbsp; Loading...</span>
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
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <form wire:submit.prevent='cekpasien'>
                        <div class="form-group row">
                            <label class="col-md-4 text-sm text-right">Tanggal</label>
                            <div class="col-md-8 input-group input-group-sm">
                                <input type="date" class="form-control input-group-sm text-sm @error('tanggal')is-invalid @enderror" wire:model.defer='tanggal'>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 text-sm text-right">Nomor</label>
                            <div class="col-md-8 input-group input-group-sm">
                                <input type="text" autofocus class="form-control input-group-sm text-sm @error('cari')is-invalid @enderror "wire:model.defer="cari" placeholder="Nomor RM / NIK / BPJS" required maxlength="16">
                                    <span class="input-group-append">
                                        <button wire:click="cekpasien" type="button" class="btn btn-info"> Cari</button>
                                    </span>
                                    @error('cari')<span class="invalid-feedback">{{$message}}</span>@enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row"style="margin-bottom:-10px;">
                    <label class="col-md-4 text-sm col-form-label text-right">REKAM MEDIS</label>
                    <label class="control-label text-sm col-md-8 text-uppercase" >{{$no_Rm}}</label>
                </div>
                <div class="form-group row"style="margin-bottom:-10px;">
                    <label class="col-md-4 text-sm col-form-label text-right">Nama</label>
                    <label class="control-label text-sm col-md-8">{{$nama}}</label>
                </div>
                <div class="form-group row" style="margin-bottom:-10px;">
                    <label class="col-md-4 text-sm col-form-label text-right">TGL LAHIR</label>
                    <label class="control-label text-sm col-md-8">{{$tgl_lahir}}</label>
                </div>
                <div class="form-group row" style="margin-bottom:-10px;">
                    <label class="col-md-4 text-sm col-form-label text-right">Jenkel</label>
                    <label class="control-label text-sm col-md-8">@if($jenkel === 'L')LAKI-LAKI  @elseif($jenkel === 'P') PEREMPUAN @endif </label>
                </div>
                <div class="form-group row" style="margin-bottom:-10px;">
                    <label class="col-md-4 text-sm text-right">NIK</label>
                    <label class="control-label text-sm col-md-8">{{$nik}}</label>
                </div>
                <form wire:submit.prevent='test' class="form-horizontal">
                    <label class="control-label" style="margin-top:-17px;">Diagnosa</label>
                        @foreach($diagnosas as $no => $diagnosa)
                            <div class="input-group row mt-1">
                                <input type="text" class="form-control form-control-sm col-md-2 col-sm-2 col-lg-2 rounded-0" placeholder="ICD" wire:model="diagnosa.{{$no}}" required>
                                <input type="text" class="form-control form-control-sm col-md-9 col-sm-9 col-lg-9 rounded-0" placeholder="Diagnosa" wire:model="diagnosaName.{{$no}}" required disabled>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-success btn-sm" data-target="#modalcaridiagnosa"  wire:click="modalCari({{$no}})" data-toggle="modal"@disabled($form) >...</button>
                                    </div>
                                    <div class="input-group-append">
                                        @if($no===0)
                                            <button class="btn btn-primary btn-sm btn-flat" type="button" wire:click="addDiagnosa('{{$no}}')" @disabled($form)>
                                                <b>+</b>
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-danger btn-sm btn-flat" wire:click="removeDiagnosa('{{$no}}')" @disabled($form)>
                                                <i class="fa fa-times text-xs bg-denger"></i>
                                            </button>
                                        @endif
                                    </div>
                            </div>
                        @endforeach
                    <label class="control-label" style="margin-top:15px">Dokter</label>
                        <div class="col-md-12 col-lg-12 col-sm-12 mt-12">
                            <select placeholder="Pilih Dokter" wire:model="id_dokter" class="form-control form-control-sm  rounded-0" @disabled($form) required>
                                <option selected value="">--PILIH DOKTER--</option>
                                    @foreach ($dokter as $data )
                                        <option value="{{$data->id_dok}}" selected>{{$data->nama}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-sm mt-3 float-right mt-50 btn-flat" type="submit" @disabled($form)>Simpan</button>
                            <input type="text" wire:model="id_kunjungan" hidden>
                            <input type="text" wire:model="id_pasien" hidden>
                        </div>
                </form>
        </div>
    </div>
</div>

    <script>
    window.addEventListener('datatidakditemukan', event => {
        Swal.fire({
            title: 'Perhatian',
            text: "Data Kunjungan Pasien tidak ditemukan Pada tanggal tersebut",
        })
    });

    window.addEventListener('alert', event => {
        Swal.fire({
            title: event.detail.title,
            text : event.detail.text,
            icon : event.detail.icon,
        })
    });

    </script>
</div>
