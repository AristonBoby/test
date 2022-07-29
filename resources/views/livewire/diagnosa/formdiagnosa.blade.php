
    <div class="col-lg-4 col-md-8 col-sm-12">   
        <div class="card card-danger card-outline">
            <div class="card-header">
                <h3 class="card-title">Input Diagnosa Penyakit</h3>
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
                                <input type="date" class="form-control input-group-sm text-sm @error('tanggal')is-invalid @enderror" wire:model='tanggal'>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 text-sm">No</label>
                                <div class="col-md-8 input-group input-group-sm">
                                    <input type="text" class="form-control input-group-sm text-sm @error('cari')is-invalid @enderror "wire:model="cari" placeholder="Nomor RM / NIK" required maxlength="16">
                                    <span class="input-group-append">
                                        <button wire:click="cekpasien" type="button" class="btn btn-info" >Cari</button>
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
                                <form wire:submit.prevent='store'> 
                                    <div class="col-md-12" style="padding-right: 18px;margin-top:1px;">
                                        <div class="input-group">
                                            <div class="col-md-3">
                                                <input type="text" maxlength="6" @disabled($form) wire:model="diagnosa" class="form-control rounded-0 form-control-sm" required >
                                            </div>   
                                          
                                                <input class="form-control form-control-sm"  wire:model="nama_diagnosa" type="text"  style="margin-left:-10px;" disabled required>
                                                <a  wire:click.prevent="cek" @disabled($form) class="btn btn-default btn-sm rounded-0" >
                                                    <i>Cari</i>
                                                </a>
                                                <a data-target="#modalcaridiagnosa" data-toggle="modal" class="btn btn-default btn-sm rounded-0">
                                                    ...
                                                </a>
                                        </div>
                                    </div>

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
    window.addEventListener('diagnosa', event => {
        Swal.fire({
            title: 'Berhasil',
            text: "Data Pasien tidak ditemukan",
            icon: 'success',
        })
    });
    window.addEventListener('tambahdiagnosa', event => {
                  Swal.fire({
                  title: 'Tambah Diagnosa Penyakit',
                  text: "Hapus Data",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                  confirmButtonText: 'YA'
                }).then((result) => {
                  if (result.isConfirmed) {
                      Livewire.emit('tambahdiagnosa')
                  }else{
                        Livewire.emit('clear')
                  }
                })
          });
    
    </script>
</div>
