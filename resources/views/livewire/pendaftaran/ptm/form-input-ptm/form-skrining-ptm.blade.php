<div class="card card-danger card-outline">
  <div class="card-header">
    <h5 class="card-title"><b>Skrining</b> Pasien</h5>
    <div wire:loading>
        <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-sm fas fa fa-spinner fa-spin"></i> &nbsp; Loading...</span>
    </div>
  </div>
  <div class="card-body" wire:loading.remove>
    @if(!empty($query))
        @foreach ( $query as $data )
        <div class="form-group col-lg-12 col-md-12 col-sm-12 row" style="margin-bottom:20px;">
            @if($data->ht == 1)
                <span class="badge text-xs badge-primary right">Hipertensi</span>
            @endif
            @if($data->dm == 1)
                <span style="margin-left:10px;" class="badge text-xs badge-danger right">Diabetes Melitus</span>
            @endif
        </div>
        <table class="table table-sm table-bordered text-sm text-uppercase">
            <tr>
                <td colspan="2" class="text-center"><b>DATA PASIEN</b></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>{{$data->nama}}</td>
            </tr>
            <tr>
                <td width="130">Tanggal Lahir</td>
                <td> @if(!empty($data->tanggal_Lahir)) {{ \Carbon\Carbon::parse($data->tanggal_Lahir)->isoFormat('dddd, DD MMMM Y')}} @endif
                    - Umur @if(!empty($data->tanggal_Lahir)) {{ \Carbon\Carbon::parse($data->tanggal_Lahir)->age}} @endif
                </td>
            </tr>
            <tr>
                <td>Kelamin</td>
                <td>@if($data->jenkel=='L')LAKI-LAKI @endif
                    @if($data->jenkel=='P')PEREMPUAN @endif
                </td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>{{$data->agama}}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>{{$data->nik}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>{{$data->alamat}}, {{$data->kel_name}}, {{$data->kec_name}}, {{$data->kota_name}}</td>
            </tr>
        </table>
        <table class="table table-sm table-bordered text-sm text-uppercase mt-5">
            <tr>
                <td colspan="2" class="text-center"><b>SKRINING KESEHATAN</b></td>
            </tr>
            <tr>
                <td colspan="2" class="mt-5"><b>Riwayat Penyakit Tidak Menular Pada Keluarga</b></td>
            </tr>
            <tr>
                <td width="150">Riwayat 1</td>
                <td>{{$data->riwayatKeluarga1}}</td>
            </tr>
            <tr>
                <td width="150">Riwayat 2</td>
                <td>{{$data->riwayatKeluarga2}}</td>
            </tr>
            <tr>
                <td width="150">Riwayat 3</td>
                <td>{{$data->riwayatKeluarga3}}</td>
            </tr>
            <tr>
                <td colspan="2" class="mt-5"><b>Riwayat Penyakit Tidak Menular Pada Diri Sendiri</b></td>
            </tr>
            <tr>
                <td width="150">Riwayat 1</td>
                <td>{{$data->riwayatSendiri1}}</td>
            </tr>
            <tr>
                <td width="150">Riwayat 2</td>
                <td>{{$data->riwayatSendiri2}}</td>
            </tr>
            <tr>
                <td width="150">Riwayat 3</td>
                <td>{{$data->riwayatSendiri3}}</td>
            </tr>
            <tr>
                <td colspan="2" class="mt-5"><b>Faktor Risiko</b></td>
            </tr>
            <tr>
                <td>Merokok</td>
                <td>{{$data->merokok}}</td>
            </tr>
            <tr>
                <td>Kurang Aktifitas Fisik</td>
                <td>{{$data->aktifitasFisik}}</td>
            </tr>
            <tr>
                <td>Gula Berlebihan</td>
                <td>{{$data->gula}}</td>
            </tr>
            <tr>
                <td>Garam Berlebihan</td>
                <td>{{$data->garam}}</td>
            </tr>
            <tr>
                <td>Lemak Berlebihan</td>
                <td>{{$data->lemak}}</td>
            </tr>
            <tr>
                <td>Kurang Makan Buah dan Sayur</td>
                <td>{{$data->sayur}}</td>
            </tr>
            <tr>
                <td>Konsumsi Alkohol</td>
                <td>{{$data->alkohol}}</td>
            </tr>
            <tr>
                <td colspan="2" class="mt-5"><b>Diagnosis</b></td>
            </tr>
            <tr>
                <td>Diagnosis 1</td>
                <td>{{$data->diagnosis1}}</td>
            </tr>
            <tr>
                <td>Diagnosis 2</td>
                <td>{{$data->diagnosis2}}</td>
            </tr>
            <tr>
                <td>Diagnosis 3</td>
                <td>{{$data->diagnosis3}}</td>
            </tr>
            <tr>
                <td>Terapi Farmakologi</td>
                <td>{{$data->terapiFarmakologi}}</td>
            </tr>
            <tr>
                <td>Konseling, Informasi dan Edukasi Kesehatan</td>
                <td>{{$data->konseling}}</td>
            </tr>
            <tr>
                <td colspan="2" class="mt-5"><b>Pemeriksaan IVA</b></td>
            </tr>
            <tr>
                <td>Hasil IVA</td>
                <td>{{$data->hasilIva}}</td>
            </tr>
            <tr>
                <td>Tindak Lanjut IVA Positif</td>
                <td>{{$data->tindakLanjutIva}}</td>
            </tr>
            <tr>
                <td colspan="2" class="mt-5"><b>Pemeriksaan Sadanis</b></td>
            </tr>
            <tr>
                <td>Hasil SADANIS</td>
                <td>{{$data->hasilSadanis}}</td>
            </tr>
            <tr>
                <td>Tindak Lanjut SADANIS</td>
                <td>{{$data->tidakLanjutSadanis}}</td>
            </tr>
            <tr>
                <td colspan="2" class="mt-5"><b>Form UBM</b></td>
            </tr>
            <tr>
                <td>Konseling</td>
                <td>{{$data->konselingUbm}}</td>
            </tr>
            <tr>
                <td>CAR</td>
                <td>{{$data->car}}</td>
            </tr>
            <tr>
                <td>Rujuk UBM</td>
                <td>{{$data->ubm}}</td>
            </tr>
            <tr>
                <td>Kondisi</td>
                <td>{{$data->kondisi}}</td>
            </tr>
        </table>
        @endforeach
    @endif
  </div>
</div>
