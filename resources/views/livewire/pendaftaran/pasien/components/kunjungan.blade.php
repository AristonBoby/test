    <div class="col-lg-4 col-md-8 col-sm-12">   
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">Input Kunjungan Pasien</h3>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-4 text-sm">No</label>
                                <div class="col-md-8 input-group input-group-sm">
                                    <input type="text" class="form-control input-group-sm text-sm" wire:model="cari" placeholder="Nomor RM / NIK / BPJS" required maxlength="16">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-info">Cari</button>
                                        <button data-toggle="modal" data-target="#modalKunjunganCariPasien" type="button" class="btn btn-default"> >>> </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                        <div class="col-md-12">
                    <form wire:submit.prevent='simpanKunjungan' >
                        @csrf
                            <input type="hidden" wire.model='id_pasien'>
                            <div class="form-group row"style="margin-bottom:-3px;">
                                <label class="col-md-4 text-sm">NOMOR REKAM MEDIS</label>
                                <label class="control-label text-sm col-sm-6">{{$no_Rm}}</label>
                            </div>
                            <div class="form-group row"style="margin-bottom:-3px;">
                                <label class="col-md-4 text-sm">NAMA</label>
                                <label class="control-label text-sm col-sm-6">{{$nama}}</label>
                            </div>
                            <div class="form-group row" style="margin-bottom:-3px;">
                                <label class="col-md-4 text-sm">TANGGAL LAHIR</label>
                                <label class="control-label text-sm col-sm-6">{{$tanggal_Lahir}}</label>
                            </div>
                            <div class="form-group row" style="margin-bottom:-3px;">
                                <label class="col-md-4 text-sm">NIK</label>
                                <label class="control-label text-sm col-sm-6">{{$nik}}</label>
                            </div>
                            <div class="form-group row" style="margin-bottom:-3px;">
                                <label class="col-md-4 text-sm">BPJS</label>
                                <label class="control-label text-sm col-sm-6">{{$bpjs}}</label>
                            </div>
                            <div class="form-group row" style="margin-bottom:-3px;">
                                <label class="col-md-4 text-sm">TELEPON</label>
                                <label class="control-label text-sm col-sm-6">{{$no_tlpn}}</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 text-sm">TANGGAL KUNJUNGAN</label>
                                <div class="col-md-6">
                                    <input type="date"  wire:model='tanggal' class="form-control form-control-sm rounded-0" required @disabled($form)>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="form-control-label text-sm col-md-4">POLI</label>
                                <div class="col-md-6">
                                    <select class="form-control form-control-sm text-sm rounded-0"  @disabled($form)>
                                        <option selected disabled>Pilih Salah Satu</option>
                                        @foreach ($poli as $polis )
                                            <option value="{{$polis->id_poli}}">{{$polis->nama_poli}}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary btn-flat float-right"  @disabled($form)>Simpan</button>
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

    </script>