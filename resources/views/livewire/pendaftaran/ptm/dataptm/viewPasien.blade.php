<div wire:ignore.self class="modal fade" id="viewPasien" role="dialog" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit"><b>DATA</b> PASIEN</h5>
            <div wire:loading>
              <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
            <a type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="text-sm fa fa-times"></span>
            </a>
          </div>
            <div class="modal-body " wire:loading.remove>
                <div class="col-lg-12 col-sm-12 col-md-12 ">
                    <table class="table table-stripped table-sm table-sm text-uppercase">
                        @if(!empty($dataViewPasien))
                            @foreach ( $dataViewPasien as $data )
                                <tr>
                                    <td width=100% colspan='3' class="text-center"><h4><b>DATA PASIEN</b></h4></td>
                                </tr>
                                <tr>
                                    <td width=100% colspan='3' class="text-right"> <h4>No. Rekam Medis : <b>@if(!empty($data->no_Rm)) {{$data->no_Rm}}@else <span class="badge bg-danger text-sm">Nomor Rekam Medis Tidak Ada</span> @endif</b></h4></td>
                                </tr>
                                <tr>
                                    <td width=10px >Nama</td>
                                    <td  width=1>:</td>
                                    <td width=200px class="text-uppercase">@if(!empty($data->nama)) {{$data->nama}} @endif</td>
                                </tr>
                                <tr>
                                    <td >Tempat, Tanggal Lahir</td>
                                    <td >:</td>
                                    <td class="text-uppercase"> @if(!empty($data->tempat_Lahir)) {{$data->tempat_Lahir}}, @endif
                                                                @if(!empty($data->tanggal_Lahir)) {{ \Carbon\Carbon::parse($data->tanggal_Lahir)->isoFormat('dddd, DD MMMM Y')}} @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td >Jenis Kelamin</td>
                                    <td >:</td>
                                    <td class="text-uppercase">@if(!empty($data->jenkel)) @if($data->jenkel=='L')LAKI-LAKI @elseif($data->jenkel=='P')PEREMPUAN @endif  @endif</td>
                                </tr>
                                <tr>
                                    <td >Kepala Keluarga</td>
                                    <td >:</td>
                                    <td >@if(!empty($data->kepala_keluarga)) {{$data->kepala_keluarga}}@else <span class="badge bg-danger text-xs">Data tidak diisi</span> @endif </td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td >:</td>
                                    <td >@if(!empty($data->agama)) {{$data->agama}}@else <span class="badge bg-danger text-xs">Data tidak diisi</span> @endif </td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td >:</td>
                                    <td >@if(!empty($data->pekerjaan)) {{$data->pekerjaan}}@else <span class="badge bg-danger text-xs">Data tidak diisi</span> @endif </td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td >:</td>
                                    <td >@if(!empty($data->nik)) {{$data->nik}}@else <span class="badge bg-danger text-xs">Data tidak diisi</span> @endif </td>
                                </tr>
                                <tr>
                                    <td>BPJS</td>
                                    <td >:</td>
                                    <td >@if(!empty($data->bpjs)) {{$data->bpjs}}@else <span class="badge bg-danger text-xs">Data tidak diisi</span> @endif </td>
                                </tr>
                                <tr>
                                    <td>No. Telepon</td>
                                    <td >:</td>
                                    <td >@if(!empty($data->no_tlpn)) {{$data->no_tlpn}}@else <span class="badge bg-danger text-xs">Data tidak diisi</span> @endif </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td >:</td>
                                    <td >@if(!empty($data->no_tlpn)) {{$data->alamat}}, {{$data->kel_name}}, {{$data->kec_name}}, {{$data->kota_name}}@else <span class="badge bg-danger text-xs">Data tidak diisi</span> @endif </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Daftar</td>
                                    <td >:</td>
                                    <td >@if(!empty($data->created_at)) {{$data->created_at}}@else <span class="badge bg-danger text-xs">Data tidak diisi</span> @endif </td>
                                </tr>
                                <tr>
                                    <td>Petugas Pendaftar</td>
                                    <td >:</td>
                                    <td >@if(!empty($data->name)) {{$data->name}}@else <span class="badge bg-danger text-xs">Data tidak diisi</span> @endif </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" data-dismiss="modal"><span class="text-sm fa fa-times"></span> Tutup</button>
            </div>
        </div>
    </div>
</div>
