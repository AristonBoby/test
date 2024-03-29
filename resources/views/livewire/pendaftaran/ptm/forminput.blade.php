<div class="card card-primary card-outline">

        <div class="card-header">
            <h5 class="card-title"><b>Form Input</b> PTM</h5>
            <div wire:loading>
                <span class="badge bg-success text-sm"style="margin-left:5px;"> <i class="text-sm fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
        </div>

        <div class="card-body text-sm">
            <form wire:submit.prevent='simpanPtm' class="form-horizontal">
            <div class="row">
                @csrf
                <div class="col-md-12" style="margin-bottom:-14px;">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">Nama Lengkap</label>
                            <div class="col-md-8">
                                <input type="text" @disabled($form) wire:model.defer="nama" class="form-control form-control-sm @error('nama') is-invalid @enderror" placeholder="Nama Lengkap">
                            @error('nama')<span class="invalid-feedback">{{$message}} {{$this->dispatchBrowserEvent('no_Rm_Ganda');}}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="margin-bottom:-14px;">
                    <div class="form-group row rounded-0">
                        <label class="col-md-4 col-form-label ">Tanggal Lahir</label>
                        <div class="col-md-8">
                            <input type="date" @disabled($form) wire:model.defer="tanggal_Lahir" placeholder="Tanggal lahir" class=" form-control form-control-sm  @error('tanggal_Lahir') is-invalid @enderror">
                            @error('tanggal_Lahir')<span class="invalid-feedback">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="margin-bottom:-14px;">
                    <div class="form-group row">
                        <label class="col-md-4  rounded-0">Kelamin</label>
                        <div class="col-md-8">
                            <select @disabled($form) class="form-control form-control-sm @error('jenkel') is-invalid @enderror " wire:model.defer="jenkel" >
                                <option value="">Pilih Salah Satu</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('jenkel')<span class="invalid-feedback">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="margin-bottom:-10px;">
                    <div class="form-group row">
                        <label class="col-md-4">Agama</label>
                        <div class="col-md-8">
                            <select @disabled($form) class="form-control form-control-sm @error('agama')is-invalid @enderror" wire:model.defer='agama'>
                                <option value="" >Pilih Salah Satu</option>
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

                <div class="col-md-12" style="margin-bottom:-10px;">
                    <div class="form-group row">
                        <label class="col-md-4  rounded-0">Pekerjaan</label>
                        <div class="col-md-8">
                            <input @disabled($form) type="text" wire:model.defer='pekerjaan' class="form-control form-control-sm @error('pekerjaan') is-invalid @enderror" placeholder="Pekerjaan" maxlength="50">
                            @error('pekerjaan')<span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-bottom:-10px;">
                    <div class="form-group row">
                        <label class="col-md-4  rounded-0">No. Telepon / HP</label>
                        <div class="col-md-8">
                            <input @disabled($form) type="text" wire:model.defer='no_tlpn' class=" number form-control form-control-sm @error('no_tlpn') is-invalid @enderror" placeholder="Nomor Telepon" maxlength="13">
                            @error('no_tlpn')<span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="margin-bottom:-10px;">
                    <div class="form-group row">
                        <label class="col-md-4  rounded-0">NIK</label>
                        <div class="col-md-8">
                            <input @disabled($form) type="text" wire:model.defer='nik' class="@error('nik')is-invalid @enderror number form-control form-control-sm" placeholder="Nomor Induk Kependudukan" maxlength="16">
                            @error('nik')<span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-12" style="margin-bottom:-10px;">
                    <div class="form-group row">
                        <label class="col-md-4 ">Provinsi</label>
                        <div class="col-md-8">
                            <select id="test" wire:model.lazy="prov" class="rounded-0 form-control form-control-sm @error('prov') is-invalid @enderror" @disabled($form)>
                                <option value="">-- Pilih Provinsi --</option>
                                @foreach ($provinsi as $data)
                                    <option value="{{$data->prov_id}}">{{$data->prov_name}}</option>
                                @endforeach
                            </select>
                            @error('prov')<span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" style="margin-bottom:-10px;">
                    <div class="form-group row">
                        <label class="col-md-4 ">Kab/Kota</label>
                        <div class="col-md-8">
                            <select id="test" class="form-control form-control-sm @error('kota_id') is-invalid @enderror" wire:model.lazy="kota_id" @disabled($form)>
                                <option selected value="">-- Pilih Kab/Kota --</option>
                                @foreach ($kota as $data)
                                    <option value="{{$data->kota_id}}" >{{$data->kota_name}}</option>
                                @endforeach
                            </select>
                            @error('kota_id')<span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-12" style="margin-bottom:-10px;">
                    <div class="form-group row">
                        <label class="col-md-4 ">Kecamatan</label>
                        <div class="col-md-8">
                            <select id="test"class="form-control form-control-sm @error('id_kec') is-invalid @enderror" wire:model.lazy="id_kec" @disabled($form)>
                                <option selected value="">-- Pilih Kecamatan --</option>
                                @foreach ($kec as $data)
                                    <option value="{{$data->id_kec}}" >{{$data->kec_name}}</option>
                                @endforeach
                            </select>
                            @error('id_kec')<span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-12" style="margin-bottom:-10px;">
                    <div class="form-group row">
                        <label class="col-md-4 ">Kelurahan / Desa</label>
                        <div class="col-md-8">
                            <select id="test"class="form-control form-control-sm @error('idkelurahan') is-invalid @enderror" wire:model.lazy="idkelurahan" @disabled($form)>
                                <option selected value="">-- Pilih Kelurahan / Desa --</option>
                                @foreach ($kel as $data)
                                    <option value="{{$data->id_kel}}" >{{$data->kel_name}}</option>
                                @endforeach
                            </select>
                            @error('idkelurahan')<span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="margin-bottom:-10px;">
                    <div class="form-group row">
                        <label class="col-md-4 ">Alamat</label>
                        <div class="col-md-8">
                            <textarea @disabled($form) placeholder="Alamat" wire:model.defer="alamat" class="form-control form-control-sm  @error('alamat') is-invalid @enderror" wire:model.defer='alamat'></textarea>
                            @error("alamat")<span class="invalid-feedback text-sm">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top:12px;">
                <button type="submit" class="btn btn-primary btn-sm text-sm float-right ml-1"><i class="far fa-save text-sm fa-light"></i> Simpan</button>
                <a @disabled($form) class="btn btn-danger btn-sm float-right " id="myBtn" style="margin-left:5px;"><b class="text-sm fas fa-times"></b> <span class="text-sm">Batal</span></a>
                <!--<button type="button" wire:click="modal"  data-toggle="modal" data-target="#riwayatDialog" class="btn btn-success btn-sm float-right"><i class="text-sm fas fa-save"></i> <span class="text-sm">Simpan</span></button>-->
            </div>
        </div>
    </form>
</div>
