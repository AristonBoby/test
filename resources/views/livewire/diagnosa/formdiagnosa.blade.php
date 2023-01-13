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
                                    <label class="col-md-4 text-sm">Tanggal Kunjungan</label>
                                    <div class="col-md-8 input-group input-group-sm">
                                        <input type="date" class="form-control input-group-sm text-sm @error('tanggal')is-invalid @enderror" wire:model.defer='tanggal'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 text-sm">No</label>
                                    <div class="col-md-8 input-group input-group-sm">
                                        <input type="text" autofocus class="form-control input-group-sm text-sm @error('cari')is-invalid @enderror "wire:model.defer="cari" placeholder="Nomor RM / NIK / BPJS" required maxlength="16">
                                        <span class="input-group-append">
                                            <button wire:click="cekpasien" type="button" class="btn btn-info"> Cari</button>
                                        </span>
                                    </div>
                            </form>
                            </div>
                        </div>
                    <div class="col-md-12">
                            <div class="form-group row"style="margin-bottom:-3px;">
                                <label class="col-md-5 text-sm">NOMOR REKAM MEDIS</label>
                                <label class="control-label text-sm col-sm-6">{{$no_Rm}}</label>
                            </div>
                            <div class="form-group row"style="margin-bottom:-3px;">
                                <label class="col-md-5 text-sm">Nama</label>
                                <label class="control-label text-sm col-sm-6">{{$nama}}</label>
                            </div>
                            <div class="form-group row" style="margin-bottom:-3px;">
                                <label class="col-md-5 text-sm">TANGGAL LAHIR</label>
                                <label class="control-label text-sm col-sm-6">{{$tgl_lahir}}</label>
                            </div>
                            <div class="form-group row" style="margin-bottom:-3px;">
                                <label class="col-md-5 text-sm">Jenkel</label>
                                <label class="control-label text-sm col-sm-6">@if($jenkel === 'L')LAKI-LAKI  @elseif($jenkel === 'P') PEREMPUAN @endif </label>
                            </div>
                            <div class="form-group row" style="margin-bottom:8px;">
                                <label class="col-md-5 text-sm">NIK</label>
                                <label class="control-label text-sm col-sm-6">{{$nik}}</label>
                            </div>
                            
                                <label class="control-label">Diagnosa</label>
                                <form wire:submit.prevent='test'> 
                                    @foreach($diagnosas as $no => $diagnosa)
                                        <div class="input-group row mt-1">
                                            <input type="text" class="form-control form-control-sm col-md-2  col-sm-2 col-lg-2 rounded-0" wire:model="diagnosa.{{$no}}" disabled>
                                            <input type="text" class="form-control form-control-sm col-md-9 col-sm-9 col-lg-9 rounded-0"  wire:model="diagnosaName.{{$no}}" disabled>
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
                                    <label>Dokter</label>
                                    <div class="col-md-8 mt-12">  
                                        <select placeholder="Pilih Dokter" wire:model="id_dokter" class="form-control form-control-sm  rounded-0" @disabled($form) required>
                                            <option selected value="">--PILIH DOKTER--</option>
                                            @foreach ($dokter as $data )
                                                <option value="{{$data->id_dok}}" selected>{{$data->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                    <input type="text" wire:model="id_kunjungan" hidden>
                                    <input type="text" wire:model="id_pasien" hidden>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-sm mt-3 float-right mt-50 btn-flat" type="submit" @disabled($form)>Simpan</button>
                                    </div>
                                </form>
                                </div>       
                                <button wire:click="city_change(5)">Cek</button>
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
            text: "Data Pasien tidak ditemukan",
            icon: 'success',
        })
    });
    
    </script>
</div>
