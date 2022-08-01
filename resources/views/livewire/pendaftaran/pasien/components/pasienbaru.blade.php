    <div class="col-lg-4 col-md-8 col-sm-12">   
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">Pendaftaran Pasien Baru</h3>
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
                        <form wire:submit.prevent='store' class="form-horizontal">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group row ">
                                    <label class="col-md-4 col-form-label text-sm">No. Rekam Medis</label>
                                    <div class="col-md-8">
                                        <input type="text" wire:model="no_Rm"class="form-control form-control-sm text-sm rounded-0 @error('no_Rm') is-invalid @enderror " placeholder="Nomor Rekam Medis" maxlength="8">
                                        @error('no_Rm') <span class="invalid-feedback">{{ $message }} </span> @enderror
                                    </div>
                                </div>
                            </div>


                            
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-sm">Nama Lengkap</label>
                                    <div class="col-md-8">
                                        <input type="text" wire:model="nama" class="form-control form-control-sm text-sm rounded-0 @error('nama') is-invalid @enderror" placeholder="Nama Lengkap">
                                        @error('nama')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-4 col-from-label text-sm">Tempat Lahir</label>
                                    <div class="col-md-8">
                                        <input type="text" wire:model="tempat_Lahir" class="form-control form-control-sm text-sm rounded-0 @error('tempat_Lahir')is-invalid @enderror" placeholder="Tempat Lahir"> 
                                        @error('tempat_Lahir')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group row rounded-0">
                                    <label class="col-md-4 col-form-label text-sm">Tanggal Lahir</label>
                                    <div class="col-md-8">
                                        <input type="date"  wire:model="tanggal_Lahir" value="{{$tanggal_Lahir}}" placeholder="Tanggal lahir" class=" form-control form-control-sm text-sm rounded-0 @error('tanggal_Lahir') is-invalid @enderror" placeholder="Tanggal Lahir">
                                        @error('tanggal_Lahir')<span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-12">
                                <div class="form-group row rounded-0">
                                    <label class="col-md-4 col-form-label text-sm">Kepala Keluarga</label>
                                    <div class="col-md-8">
                                        <input type="text" wire:model="kepala_keluarga" class="form-control form-control-sm text-sm rounded-0 @error('kepala_keluarga') is-invalid @enderror" placeholder="Kepala Keluarga">
                                        @error('kepala_keluarga')<span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-4 text-sm rounded-0">Kelamin</label>
                                    <div class="col-md-8">
                                        <select class="form-control form-control-sm text-sm rounded-0 @error('jenkel') is-invalid @enderror " wire:model="jenkel" >
                                            <option>Pilih Salah Satu</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                        @error('jenkel')<span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-4 text-sm rounded-0">Agama</label>
                                    <div class="col-md-8">
                                        <select class="form-control form-control-sm text-sm rounded-0 @error('agama')is-invalid @enderror" wire:model='agama'>
                                            <option>Pilih Salah Satu</option>
                                            <option>Islam</option>
                                            <option>Kristen</option>
                                            <option>Khatolik</option>
                                            <option>Hindu</option>
                                            <option>Buddha</option>
                                            <option>Konghucu</option>
                                        </select>
                                        @error('agama')<span class="invalid-feedback">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-4 text-sm rounded-0">Pekerjaan</label>
                                    <div class="col-md-8">
                                        <input type="text" wire:model='pekerjaan' class="form-control form-control-sm text-sm rounded-0 @error('pekerjaan') is-invalid @enderror" placeholder="Pekerjaan" maxlength="50">
                                        @error('pekerjaan')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-4 text-sm rounded-0">No. Telepon / HP</label>
                                    <div class="col-md-8">
                                        <input type="text" wire:model='no_tlpn' class=" number form-control form-control-sm text-sm rounded-0 @error('no_tlpn') is-invalid @enderror" placeholder="Nomor Telepon" maxlength="13">
                                        @error('no_tlpn')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-4 text-sm rounded-0">NIK<code>*</code></label>
                                    <div class="col-md-8">
                                        <input type="text" wire:model='nik' class="@error('nik')is-invalid @enderror number form-control form-control-sm text-sm rounded-0" placeholder="Nomor Induk Kependudukan" maxlength="16">
                                        @error('nik')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-4 text-sm">No. BPJS</label>
                                    <div class="col-md-8">
                                        <input type="text" wire:model='bpjs' class=" number @error('bpjs')is-invalid @enderror form-control form-control-sm text-sm rounded-0" placeholder="Nomor BPJS" maxlength="13">
                                        @error('bpjs')<span class="invalid-feedback">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-4 text-sm">Alamat</label>
                                    <div class="col-md-8">
                                        <textarea placeholder="Alamat" class="form-control form-control-sm text-sm rounded-0 @error('alamat') is-invalid @enderror" wire:model='alamat'></textarea>
                                        @error("alamat")<span class="invalid-feedback text-xs">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary btn-flat float-right" >Simpan</button>
                        </div>
                </form>
            </div>
        </div>
        <script>
            window.addEventListener('simpan', event => {
            Swal.fire({
                title: 'Berhasil',
                text: "Data Berhasil di Simpan",
                icon: 'success',
            })
        });
        </script>