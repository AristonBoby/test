    <div style="font-family:'Arial';">  
            <div class="card card-default card-outline">
                <div class="card-body text-sm">
                    <form @if($modeUpdate==1) wire:submit.prevent="store" @elseif($modeUpdate==0) wire:submit.prevent="updateData"@endif  class="form-horizontal">
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom:-8px;">
                                <div class="form-group row ">
                                    <label class="col-md-4 control-label">No. Rekam Medis</label>
                                    <div class="col-md-8">
                                        <input @disabled($form) id="noRm" type="text" wire:model.lazy="pasien.varRm"class="form-control form-control-sm   @error('pasien.varRm') is-invalid @enderror " placeholder="Nomor Rekam Medis" maxlength="15">
                                        @error('pasien.varRm')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12" style="margin-bottom:-8px;">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Nama Lengkap</label>
                                    <div class="col-md-8">
                                        <input @disabled($form) type="text" wire:model.lazy="pasien.varNama" class="form-control form-control-sm @error('pasien.varNama') is-invalid @enderror" placeholder="Nama Lengkap">
                                        @error('pasien.varNama')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-bottom:-8px;">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label ">Tempat Lahir</label>
                                    <div class="col-md-8">
                                        <input @disabled($form) type="text" wire:model.lazy="pasien.varTmplahir" class="form-control form-control-sm   @error('pasien.varTmplahir')is-invalid @enderror" placeholder="Tempat Lahir"> 
                                        @error('pasien.varTmplahir')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-bottom:-8px;">
                                <div class="form-group row ">
                                    <label class="col-md-4 control-label ">Tanggal Lahir</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input @disabled($form) type="text" onchange='Livewire.emit("selectDate", this.value)'  class="date form-control form-control-sm @error('pasien.varTgllahir') is-invalid @enderror" placeholder="dd-mm-yyyy" readonly>
                                            <span class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </span>
                                        </div>
                                        @error('pasien.varTgllahir')<span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12" style="margin-bottom:-8px;">
                                <div class="form-group row ">
                                    <label class="col-md-4 control-label">Kepala Keluarga</label>
                                    <div class="col-md-8">
                                        <input @disabled($form) type="text" wire:model.lazy="pasien.varKepalakeluarga" class="form-control form-control-sm @error('pasien.varKepalakeluarga') is-invalid @enderror" placeholder="Kepala Keluarga">
                                        @error('pasien.varKepalakeluarga')<span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-bottom:-8px;">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Kelamin</label>
                                    <div class="col-md-8">
                                        <select @disabled($form) class="form-control form-control-sm @error('pasien.varKelamin') is-invalid @enderror " wire:model.lazy="pasien.varKelamin" >
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                        @error('pasien.varKelamin')<span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-bottom:-8px;">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Agama</label>
                                    <div class="col-md-8">
                                        <select @disabled($form) class="form-control form-control-sm @error('pasien.varAgama')is-invalid @enderror" wire:model.lazy='pasien.varAgama'>
                                            <option value="">Pilih Salah Satu</option>
                                            <option>Islam</option>
                                            <option>Kristen</option>
                                            <option>Khatolik</option>
                                            <option>Hindu</option>
                                            <option>Buddha</option>
                                            <option>Konghucu</option>
                                        </select>
                                        @error('pasien.varAgama')<span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-bottom:-8px;">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Pekerjaan</label>
                                    <div class="col-md-8">
                                        <input @disabled($form) type="text" wire:model.lazy='pasien.varPekerjaan' class="form-control form-control-sm @error('pasien.varPekerjaan') is-invalid @enderror" placeholder="Pekerjaan" maxlength="50">
                                        @error('pasien.varPekerjaan')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:-8px;">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">No. Telepon / HP</label>
                                    <div class="col-md-8">
                                        <input @disabled($form) type="text" wire:model.lazy='pasien.varHp' class=" number form-control form-control-sm @error('pasien.varHp') is-invalid @enderror" placeholder="Nomor Telepon" maxlength="13">
                                        @error('pasien.varHp')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-bottom:-8px;">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">NIK<code>*</code></label>
                                    <div class="col-md-8">
                                        <input @disabled($form) type="text" wire:model.lazy='pasien.varNik' class="@error('pasien.varNik')is-invalid @enderror number form-control form-control-sm  " placeholder="Nomor Induk Kependudukan" maxlength="16">
                                        @error('pasien.varNik')<span class="invalid-feedback">{{$message}}</span>@enderror
                                        <span class="text-xs">*Kosongkan Jika Pasien Tidak Memiliki NIK</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-bottom:-8px;">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">No. BPJS <code>*</code></label>
                                    <div class="col-md-8">
                                        <input @disabled($form) type="text" wire:model.lazy='pasien.varBpjs' class=" number @error('pasien.varBpjs')is-invalid @enderror form-control form-control-sm  " placeholder="Nomor BPJS" maxlength="13">
                                        @error('pasien.varBpjs')<span class="invalid-feedback">{{$message}}</span>@enderror 
                                        <span class="text-xs">*Kosongkan Jika Pasien Tidak Memiliki BPJS</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12" style="margin-bottom:-8px;">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Provinsi</label>
                                    <div class="col-md-8">
                                        <select @disabled($form) id="test" wire:model.lazy="pasien.varProvinsi" class=" form-control form-control-sm @error('pasien.varProvinsi')is-invalid @enderror">
                                            <option value="">-- Pilih Provinsi --</option>
                                            @foreach ($provinsi as $data)
                                                <option value="{{$data->prov_id}}">{{$data->prov_name}}</option>   
                                            @endforeach                                     
                                        </select>
                                        @error('pasien.varProvinsi')<span class="invalid-feedback">{{$message}}</span>@enderror 
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-lg-12" style="margin-bottom:-8px;">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Kab/Kota</label>
                                    <div class="col-md-8">
                                        <select @disabled($form) id="test" class="form-control form-control-sm @error('pasien.varKota')is-invalid @enderror" wire:model.lazy="pasien.varKota" @empty($kota) disabled @endempty>
                                            <option selected>-- Pilih Kab/Kota --</option>
                                            @foreach ($kota as $data)
                                                <option value="{{$data->kota_id}}" >{{$data->kota_name}}</option>   
                                            @endforeach                                     
                                        </select>
                                        @error('pasien.varKota')<span class="invalid-feedback">{{$message}}</span>@enderror 
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12" style="margin-bottom:-8px;">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Kecamatan</label>
                                    <div class="col-md-8">
                                        <select @disabled($form) id="test"class="form-control form-control-sm @error('pasien.varKecamatan')is-invalid @enderror" wire:model.lazy="pasien.varKecamatan" >
                                            <option selected>-- Pilih Kecamatan --</option>
                                            @foreach ($kec as $data)
                                                <option value="{{$data->id_kec}}" >{{$data->kec_name}}</option>   
                                            @endforeach                                     
                                        </select>
                                        @error('pasien.varKecamatan')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12" style="margin-bottom:-8px;">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Kelurahan / Desa</label>
                                    <div class="col-md-8">
                                        <select @disabled($form) id="test"class="form-control form-control-sm @error('pasien.varKecamatan')is-invalid @enderror" wire:model.lazy="pasien.varKelurahan">
                                            <option selected>-- Pilih Kelurahan / Desa --</option>
                                            @foreach ($kel as $data)
                                                <option value="{{$data->id_kel}}" >{{$data->kel_name}}</option>   
                                            @endforeach                                     
                                        </select>
                                        @error('pasien.varKelurahan')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>               

                            <div class="col-md-12" style="margin-bottom:-8px;">
                                <div class="form-group row">
                                    <label class="col-md-4 control-label">Alamat</label>
                                    <div class="col-md-8">
                                        <textarea @disabled($form) type="text" wire:model.lazy='pasien.varAlamat' class="@error('pasien.varAlamat')is-invalid @enderror form-control form-control-sm" placeholder="Alamat Pasien"></textarea>
                                        @error('pasien.varAlamat')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top:12px;">    
                            <a @disabled($form)  class="btn btn-danger btn-sm float-right " href="{{url('/pendaftaran/daftar')}}" style="margin-left:5px;"><b class="text-sm fas fa-times"></b> <span class="text-sm">Batal</span></a>
                            <button @disabled($form) type="submit" class="btn btn-success btn-sm float-right"><i class="text-sm fas fa-save"></i> <span class="text-sm">@if($modeUpdate==1||$modeUpdate==2) Simpan @elseif($modeUpdate==0) Edit Data @endif</span></button>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script type="text/javascript">
            $("#noRm").on({
	            keypress: function(e) {
                    console.log(e.which);
                    if (e.which === 32 || e.which === 44 || e.which === 46 || e.which === 47 || e.which === 93 || e.which === 45 || e.which === 61)
    	            return false;
                },
            });

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
        <script type="text/javascript">
            $(function () {
                $('.date').datepicker({
                    format: "dd-mm-yyyy"
                });
            });
        </script>
