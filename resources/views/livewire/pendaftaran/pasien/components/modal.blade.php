   <div>       <!-- Modal -->
          <div wire:ignore.self class="modal modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">DATA PASIEN</h5>
                  <div wire:loading>
                    <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
                </div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm table-bordered text-sm">
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
                                    <td>{{$alamat}}, @if($kelurahan)KELURAHAN {{$kelurahan}} KECAMATAN {{$kecamatan}} KAB/KOTA {{$kota_name}} PROVINSI {{$prov_name}}@endempty</td>
                                </tr>
                            </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary btn-sm" href="printpasien/{{$no_Rm}}"  target="_blank"><i class="text-xs fa fa-print"></i> Print</a>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="text-xs fas fa-times"></i> Tutup</button>
                </div>
              </div>
            </div>
          </div>




          <div wire:ignore.self class="modal fade" id="edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="edit">Edit Data Pasien</h5>
                  <div wire:loading>
                    <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
                  </div>
                  <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </a>
                </div>
                <div class="modal-body">
                  <form wire:submit.prevent='editPasien'>
                    @csrf
                    <input type="hidden" wire:model.defer='id_pasien'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label text-sm">Nomor Rekam Medis</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm rounded-0 @error('no_Rm') is-invalid @enderror" wire:model.defer='no_Rm' id="recipient-name" maxlength="50">
                                    @error('no_Rm')<span class="invalid-feedback">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label text-sm">Nama Lengkap</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm rounded-0 @error('nama') is-invalid @enderror" wire:model.defer='nama'  id="recipient-name" >
                                    @error('nama')<span class="invalid-feedback">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label text-sm">Tempat Lahir</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm rounded-0 @error('tempat_Lahir') is-invalid @enderror" wire:model.defer='tempat_Lahir'" wire:model='tempat_Lahir' id="recipient-name" >
                                    @error('tempat_Lahir')<span class="invalid-feedback">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                              <label class="col-md-4 col-from-label text-sm">Tanggal Lahir</label>
                              <div class="col-md-8">
                                  <input type="date" class="form-control form-control-sm rounded-0  @error('tanggal_Lahir') is-invalid @enderror" wire:model.defer="tanggal_Lahir" id="recipient-name" >
                                  @error('tanggal_Lahir')<span class="invalid-feedback">{{$message}}</span> @enderror
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-md-4 text-sm ">Jenis Kelamin</label>
                            <div class="col-md-8">
                                <select class="form-control form-control-sm text-sm rounded-0 @error('jenkel') is-invalid @enderror " wire:model.defer="jenkel" >
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
                              <select class="form-control form-control-sm text-sm rounded-0 @error('agama')is-invalid @enderror" wire:model.defer='agama'>
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
                                  <input type="text" class="form-control text-sm form-control-sm rounded-0 @error('pekerjaan')is-invalid @enderror" wire:model.defer='pekerjaan'>
                                  @error('pekerjaan')<span class="invalid-feedback">{{$message}}</span> @enderror
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-4 col-from-label text-sm">No Telepon / HP</label>
                            <div class="col-md-8">
                              <input type="text" class="form-control text-sm form-control-sm rounded-0 number  @error('no_tlpn')is-invalid @enderror" wire:model.defer='no_tlpn' value="{{$no_tlpn}}" maxlength="16">
                              @error('no_tlpn')<span class="invalid-feedback">{{$message}}</span> @enderror
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-4 col-from-label text-sm">NIK</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control text-sm form-control-sm rounded-0 number @error('nik')is-invalid @enderror" wire:model.defer="nik" maxlength="16">
                                @error('nik')<span class="invalid-feedback">{{$message}}</span> @enderror
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-4 col-from-label text-sm">BPJS</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control text-sm form-control-sm rounded-0 number @error('bpjs')is-invalid @enderror " wire:model.defer="bpjs" maxlength="13">
                                @error('bpjs')<span class="invalid-feedback">{{$message}}</span> @enderror
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                              <label class="col-md-4 col-from-label text-sm">Provinsi</label>
                              <div class="col-md-8">
                                <select id="test" wire:model="prov" class="rounded-0 form-control form-control-sm">
                                  <option value="">-- Pilih Provinsi --</option>
                                  @foreach ($provinsi as $data)
                                      <option value="{{$data->prov_id}}">{{$data->prov_name}}</option>   
                                  @endforeach                                     
                              </select>
                              </div>
                          </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label text-sm">Kab/Kota</label>
                                <div class="col-md-8">
                                  <select id="test" wire:model="kotas" class="rounded-0 form-control form-control-sm">
                                    <option value="">-- Pilih Kota --</option>
                                    @foreach ($kota as $data)
                                        <option value="{{$data->kota_id}}">{{$data->kota_name}}</option>   
                                    @endforeach                                     
                                </select>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group row">
                                  <label class="col-md-4 col-from-label text-sm">Kecamatan</label>
                                  <div class="col-md-8">
                                    <select id="test" wire:model="kecamatan" class="rounded-0 form-control form-control-sm">
                                      <option value="">-- Pilih Kecamatan --</option>
                                      @foreach ($kec as $data)
                                          <option value="{{$data->id_kec}}">{{$data->kec_name}}</option>   
                                      @endforeach                                     
                                  </select>
                                  </div>
                              </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-4 col-from-label text-sm">Kelurahan</label>
                                    <div class="col-md-8">
                                      <select id="test" wire:model="kelurahan" class="rounded-0 form-control form-control-sm">
                                        <option value="">-- Pilih Kelurahan --</option>
                                        @foreach ($kel as $data)
                                            <option value="{{$data->id_kel}}">{{$data->kel_name}}</option>   
                                        @endforeach                                     
                                    </select>
                                    </div>
                                </div>
                                </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-4 col-from-label text-sm">Alamat</label>
                            <div class="col-md-8">
                              <textarea placeholder="Alamat" class="form-control form-control-sm text-sm rounded-0 @error('alamat') is-invalid @enderror" wire:model.defer='alamat'></textarea>
                              @error('alamat')<span class="invalid-feedback">{{$message}}</span> @enderror
                            </div>
                        </div>
                      </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="text-xs fa fa-save"></i> Ubah data</button>
                  <a type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="text-xs fas fa-times"></i> Batal</a>
                </div>
              </form>
              </div>
            </div>
          </div>

   </div>
