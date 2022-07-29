   <div>       <!-- Modal -->
          <div wire:ignore.self class="modal modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">DATA PASIEN</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-9" style="margin-bottom:-20px;">
                            <div class="form-group row" >
                                <label class="col-md-3 col-from-label text-md">NOMOR REKAM MEDIS</label>
                                <label class="col-md-8 col-form-label text-md">{{$no_Rm}}</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-9" style="margin-bottom:-20px;">
                              <div class="form-group row">
                                  <label class="col-md-3 col-from-label text-md">NAMA LENGKAP</label>
                                  <label class="col-md-8 col-form-label text-md">{{$nama}}</label>
                              </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:-20px;">
                            <div class="form-group row">
                                <label class="col-md-3 col-from-label text-md">TEMPAT LAHIR</label>
                                <label class="col-md-8 col-form-label text-md">{{$tempat_Lahir}}</label>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:-20px;">
                          <div class="form-group row">
                              <label class="col-md-3 col-from-label text-md">TANGGAL LAHIR</label>
                              <label class="col-md-8 col-form-label text-md">{{$tanggal_Lahir}}</label>
                          </div>
                      </div>
                      <div class="col-md-12" style="margin-bottom:-20px;">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label text-md">KEPALA KELUARGA</label>
                            <label class="col-md-8 col-form-label text-md">{{$kepala_keluarga}}</label>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-bottom:-20px;">
                      <div class="form-group row">
                          <label class="col-md-3 col-from-label text-md">JENIS KELAMIN</label>
                          <label class="col-md-8 col-form-label text-md">@if($jenkel == 'L')LAKI-LAKI @else PEREMPUAN @endif </label>
                      </div>
                    </div>
                      <div class="col-md-12 " style="margin-bottom:-20px;">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label text-md">AGAMA</label>
                            <label class="col-md-8 col-form-label text-md">{{$agama}}</label>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-bottom:-20px;">
                      <div class="form-group row">
                          <label class="col-md-3 col-from-label text-md">PEKERJAAN</label>
                          <label class="col-md-8 col-form-label text-md">{{$pekerjaan}}</label>
                      </div>
                    </div>
                      <div class="col-md-12" style="margin-bottom:-20px;">
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label text-md">NIK</label>
                          <label class="col-md-8 col-form-label text-md">{{$nik}}</label>
                        </div>
                      </div>
                      <div class="col-md-12" style="margin-bottom:-20px;">  
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label text-md">BPJS</label>
                          <label class="col-md-8 col-form-label text-md">{{$bpjs}}</label>
                        </div>
                      </div>
                      <div class="col-md-12" style="margin-bottom:-20px;">
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label text-md">NOMOR TELEPON / HP</label>
                          <label class="col-md-8 col-form-label text-md">{{$no_tlpn}}</label>
                        </div>
                      </div>
                      <div class="col-md-12" style="margin-bottom:-20px;">
                        <div class="form-group row">
                          <label class="col-md-3 col-from-label text-md">ALAMAT</label>
                          <label class="col-md-8 col-form-label text-md">{{$alamat}}</label>
                        </div>
                      </div>
                  </div>
                </div>
             
              
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>




          <div wire:ignore.self class="modal fade" id="edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              
                <div class="modal-header">
                  <h5 class="modal-title" id="edit">Data Pasien</h5>
                  <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </a>
                </div>
                <div class="modal-body">
                  <form wire:submit.prevent='editPasien'> 
                    @csrf
                    <input type="hidden" wire:model='id_pasien'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label text-sm">Nomor Rekam Medis</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm rounded-0 " wire:model='no_Rm' id="recipient-name" maxlength="8">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label text-sm">Nama Lengkap</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm rounded-0 " wire:model='nama'  id="recipient-name" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label text-sm">Tempat Lahir</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm rounded-0 " wire:model='tempat_Lahir' id="recipient-name" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                              <label class="col-md-4 col-from-label text-sm">Tanggal Lahir</label>
                              <div class="col-md-8">
                                  <input type="date" class="form-control form-control-sm rounded-0 " wire:model="tanggal_Lahir" id="recipient-name" >
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-md-4 text-sm ">Jenis Kelamin</label>
                            <div class="col-md-8">
                                <select class="form-control form-control-sm text-sm rounded-0 @error('jenkel') is-invalid @enderror " wire:model="jenkel" >
                                    <option>Pilih Salah Satu</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @error('jenkel')<span class="invalid-feedback">{{$message}}}</span> @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-md-4 col-from-label text-sm">Agama</label>
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
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                              <label class="col-md-4 col-from-label text-sm">Pekerjaan</label>
                              <div class="col-md-8">
                                  <input type="text" class="form-control text-sm form-control-sm rounded-0" wire:model='pekerjaan'>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-4 col-from-label text-sm">No Telepon / HP</label>
                            <div class="col-md-8">
                              <input type="text" class="form-control text-sm form-control-sm rounded-0 number " wire:model='no_tlpn' value="{{$no_tlpn}}" maxlength="16">
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-4 col-from-label text-sm">NIK</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control text-sm form-control-sm rounded-0 number " wire:model="nik" maxlength="16">
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-4 col-from-label text-sm">BPJS</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control text-sm form-control-sm rounded-0 number " wire:model="bpjs" maxlength="13">
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-4 col-from-label text-sm">Alamat</label>
                            <div class="col-md-8">
                              <textarea placeholder="Alamat" class="form-control form-control-sm text-sm rounded-0 @error('alamat') is-invalid @enderror" wire:model='alamat'></textarea>
                              @error("alamat")<span class="is-invalid">{{$message}}</span> @enderror
                            </div>
                        </div>
                      </div>
                    </div>
 
                </div>
                <div class="modal-footer">
                  <a type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</a>
                  <button type="submit" class="btn btn-primary btn-sm">Ubah Data</button>
                </div>
              </form>
              </div>
            </div>
          </div>
      
   </div>