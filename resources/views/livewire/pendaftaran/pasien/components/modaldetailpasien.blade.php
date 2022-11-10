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
                              <td>{{$alamat}} @if($kel_name), KELURAHAN {{$kel_name}}. KECAMATAN {{$kec_name}}. KAB/KOTA {{$kota_name}}. PROVINSI {{$prov_name}}@endif</td>
                          </tr>
                      </tbody>
              </table>
          </div>
          <div class="modal-footer">
              <a class="btn btn-primary btn-sm" href="printpasien/{{$no_Rm}}"  target="_blank"><i class="fas fa-print"></i> Print</a>
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><b>X</b> Tutup</button>
          </div>
        </div>
      </div>
    </div>

