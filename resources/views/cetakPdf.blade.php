<!DOCTYPE html>
<html lang="en">
<head>
    <style rel="stylesheet">
        table, tr, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding:3px;
        
}        #logo1{
        position: absolute;
        top:0px;
        left:0px;
        width:2.2cm;
        height:2.2cm;
    }
                
    </style>
    <title>Laporan Kunjungan</title>
</head>
<body>
        <table border=0 border-collapse=0 class="table table-sm" style="width:100%; font-family:Arial, Helvetica, sans-serif; font-size:9pt;">
            <tr class="text" border=0>
                <th colspan="10" height="10" style="font-size:14pt"> <img id="logo1" src="{{public_path('logo/pemkot.png')}}"> PEMERINTAH KOTA SAMARINDA</th>
            </tr>
            <tr class="text" border=0>
                <th colspan="10" height="10" style="font-size:14pt">DINAS KESEHATAN KOTA </th>
            </tr>
            <tr class="text" border=0>
                <th colspan="10" height="10" style="font-size:16pt">UPTD PUSKESMAS SEGIRI </th>
            </tr>
            <tr class="text" border=0>
                <td colspan="10" height="10" align="center" style="font-size:10pt; border-bottom:1px solid;">Jalan Ramania 2, RT.47, No.12, Kelurahan Sidodadi, Kecamatan Samarinda Ulu <br>HP : 081253721754, Email : pkmsegiri@yahoo.com </td>
            </tr>
        </table>
        <table border=0 border-collapse=0 class="table table-sm" style="margin-bottom:10px;width:100%; font-family:Arial, Helvetica, sans-serif; font-size:9pt;">
              <tr class="text" border=0>
                <th colspan="10" height="30" style="font-size:12pt">LAPORAN KUNJUNGAN</th>
            </tr>
            <tr>
                <td align="center"colspan="10"><i>Priode Tanggal : {{$tglMulai}} s.d {{$tglSampai}}</i></td>
            </tr>
        </table>
        <table border=1 border-collapse=0 class="table table-sm" style="width:100%; font-family:Arial, Helvetica, sans-serif; font-size:9pt;">    
          
                <tr class="text">
                    <th>No</th>
                    <th width="50">Tanggal</th>
                    <th width="50">Rekam Medis</th>
                    <th width="120">Nama</th>
                    <th width="50">Tanggal Lahir</th>
                    <th>L/P</th>
                    <th>NIK</th>
                    <th>Poli</th>
                    <th>Jaminan</th>
                    <th>Alamat</th>
                </tr>
                @foreach ($dataKunjungan as $no=>$data )
                <tr>
                    <td>{{$no+1}}.</td>
                    <td>{{$data->tanggal}}</td>
                    <td align="center">{{$data->no_Rm}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->tanggal_Lahir}}</td>
                    <td align="center">{{$data->jenkel}}</td>
                    <td>{{$data->nik}}</td>
                    <td align="center">{{$data->nama_poli}}</td>
                    <td align="center" >{{$data->jaminan}}</td>
                    <td >{{$data->alamat}}, {{$data->kel_name}}, {{$data->kec_name}}, {{$data->kota_name}}</td>
                </tr>
                @endforeach
        </table>    
           
            
    </div>
</body>
</html>

