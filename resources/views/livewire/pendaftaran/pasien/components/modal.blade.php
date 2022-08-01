   <div>       <!-- Modal -->
          <div wire:ignore.self class="modal modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">DATA PASIEN</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered text-sm">
                            <tbody>
                                <tr>
                                    <td>NOMOR REKAM MEDIS</td>
                                    <td>{{$no_Rm}}</td>
                                </tr>
                                <tr>
                                    <td>NAMA LENGKAP</td>
                                    <td>{{$nama}}</td>
                                </tr>
                                <tr>
                                    <td>TEMPAT LAHIR</td>
                                    <td>{{$tempat_Lahir}}</td>
                                </tr>
                                <tr>
                                    <td>TANGGAL LAHIR</td>
                                    <td>{{$tanggal_Lahir}}</td>
                                </tr>
                                <tr>
                                    <td>KEPALA KELUARGA</td>
                                    <td>{{$kepala_keluarga}}</td>
                                </tr>
                                <tr>
                                    <td>JENIS KELAMIN</td>
                                    <td>@if($jenkel == 'L')LAKI-LAKI @else PEREMPUAN @endif </td>
                                </tr>
                                <tr>
                                    <td>AGAMA</td>
                                    <td>{{$agama}}</td>
                                </tr>
                                <tr>
                                    <td>PEKERJAAN</td>
                                    <td>{{$pekerjaan}}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>{{$nik}}</td>
                                </tr>
                                <tr>
                                    <td>BPJS</td>
                                    <td>{{$bpjs}}</td>
                                </tr>
                                <tr>
                                    <td>NOMOR TELEPON / HP</td>
                                    <td>{{$no_tlpn}}</td>
                                </tr>
                                <tr>
                                    <td>ALAMAT</td>
                                    <td>{{$alamat}}</td>
                                </tr>
                            </tbody>
                    </table>
                </div>


                <div class="modal-footer">
                    <a class="btn btn-primary" href="printpasien/{{$no_Rm}}"  target="_blank">Print</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>




          <div wire:ignore.self class="modal fade" id="edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="edit">Edit Data Pasien</h5>
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
                                    <input type="text" class="form-control form-control-sm rounded-0 @error('no_Rm') is-invalid @enderror" wire:model='no_Rm' id="recipient-name" maxlength="8">
                                    @error('no_Rm')<span class="invalid-feedback">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label text-sm">Nama Lengkap</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm rounded-0 @error('nama') is-invalid @enderror" wire:model='nama'  id="recipient-name" >
                                    @error('nama')<span class="invalid-feedback">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label text-sm">Tempat Lahir</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm rounded-0 @error('tempat_Lahir') is-invalid @enderror" wire:model='tempat_Lahir'" wire:model='tempat_Lahir' id="recipient-name" >
                                    @error('tempat_Lahir')<span class="invalid-feedback">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                              <label class="col-md-4 col-from-label text-sm">Tanggal Lahir</label>
                              <div class="col-md-8">
                                  <input type="date" class="form-control form-control-sm rounded-0  @error('tanggal_Lahir') is-invalid @enderror" wire:model="tanggal_Lahir" id="recipient-name" >
                                  @error('tanggal_Lahir')<span class="invalid-feedback">{{$message}}</span> @enderror
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-md-4 text-sm ">Jenis Kelamin</label>
                            <div class="col-md-8">
                                <select class="form-control form-control-sm text-sm rounded-0 @error('jenkel') is-invalid @enderror " wire:model="jenkel" >
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
                                <option>Islam</option>
                                <option>Kristen</option>
                                <option>Khatolik</option>
                                <option>Hindu</option>
                                <option>Buddha</option>
                                <option>Konghucu</option>
                              </select>
                              @error('jenkel')<span class="invalid-feedback">{{$agama}}}</span> @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                              <label class="col-md-4 col-from-label text-sm">Pekerjaan</label>
                              <div class="col-md-8">
                                  <input type="text" class="form-control text-sm form-control-sm rounded-0 @error('pekerjaan')is-invalid @enderror" wire:model='pekerjaan'>
                                  @error('pekerjaan')<span class="invalid-feedback">{{$message}}</span> @enderror
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-4 col-from-label text-sm">No Telepon / HP</label>
                            <div class="col-md-8">
                              <input type="text" class="form-control text-sm form-control-sm rounded-0 number  @error('no_tlpn')is-invalid @enderror" wire:model='no_tlpn' value="{{$no_tlpn}}" maxlength="16">
                              @error('no_tlpn')<span class="invalid-feedback">{{$message}}</span> @enderror
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-4 col-from-label text-sm">NIK</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control text-sm form-control-sm rounded-0 number @error('nik')is-invalid @enderror" wire:model="nik" maxlength="16">
                                @error('nik')<span class="invalid-feedback">{{$message}}</span> @enderror
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-4 col-from-label text-sm">BPJS</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control text-sm form-control-sm rounded-0 number @error('bpjs')is-invalid @enderror " wire:model="bpjs" maxlength="13">
                                @error('bpjs')<span class="invalid-feedback">{{$message}}</span> @enderror
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-4 col-from-label text-sm">Alamat</label>
                            <div class="col-md-8">
                              <textarea placeholder="Alamat" class="form-control form-control-sm text-sm rounded-0 @error('alamat') is-invalid @enderror" wire:model='alamat'></textarea>
                              @error('alamat')<span class="invalid-feedback">{{$message}}</span> @enderror
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
