<!DOCTYPE html>
<html lang="en">
<head>
    <style rel="stylesheet">
table, tr, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding:3px;
        
        }        
#logo1{
        position: absolute;
        top:0px;
        left:0px;
        width:2.2cm;
        height:2.2cm;
    }
    @page {
        size: A4 landscape;
        margin-left: 10px;
        margin-right: 10px;
        margin-top: 45px;
}
                
@media print {
   .break{ page-break-before: always;}
}
    </style>
    <title>Laporan Kunjungan</title>
</head>
<body>
        <table border=0 border-collapse=0 class="table table-sm" style="width:100%; font-family:Arial, Helvetica, sans-serif; font-size:9pt;">
            <tr class="text" border=0>
                <th colspan="10" height="10" style="font-size:14pt"> <img id="logo1" src="{{url('logo/pemkot.png')}}"> PEMERINTAH KOTA SAMARINDA</th>
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
        <table border=0 border-collapse=0 class="table table-sm" style="margin-bottom:50px;width:100%; font-family:Arial, Helvetica, sans-serif; font-size:9pt;">
              <tr class="text" border=0>
                <th colspan="10" height="30" style="font-size:12pt">LAPORAN KUNJUNGAN</th>
            </tr>
            <tr>
                <td align="center"colspan="10"><i><b>Priode Tanggal : {{$tglMulai}}  s.d {{$tglSampai}}</b></i></td>
            </tr>
        </table>
        <div width=100%>
            <table  border=1 border-collapse=0 width="300" style=" margin-left:40px; float:left; font-family:Arial, Helvetica, sans-serif; font-size:9pt;">
                <tr>
                    <th>No</th>
                    <th>Poli</th>
                    <th>Jumlah</th>
                </tr>
                @foreach ($jumlahPoli as $no=>$data)
                <tr>
                    <th>{{$no+1}}.</th>
                    <td><b>{{$data->nama_poli}}</b></td>
                    <th>{{$data->jumlahPoli}}</th>
                </tr>
                @endforeach
            </table>
            <table  border=1 border-collapse=0 width="300" style="margin-bottom:-5px; margin-left:37%; font-family:Arial, Helvetica, sans-serif; font-size:9pt;">
                <tr>
                    <th>No</th>
                    <th>Jenis Kelamin</th>
                    <th>Jumlah</th>
                </tr>
                @foreach ($jumlahjenkel as $no=>$data)
                <tr>
                    <th>{{$no+1}}.</th>
                    <td><b> @if($data->jenkel=='P')PEREMPUAN @elseif($data->jenkel=="L")LAKI-LAKI @endif</b></td>
                    <th>{{$data->jumlah}}</th>
                </tr>
                @endforeach
            </table>

            <table  border=1 border-collapse=0 width="300"  style="margin-left:70%; margin-top:-210px;float:left; font-family:Arial, Helvetica, sans-serif; font-size:9pt;">
                <tr>
                    <th>No</th>
                    <th>Jaminan</th>
                    <th>Jumlah</th>
                </tr>
                @foreach ($jaminan as $no=>$data)
                    <tr>
                        <th>{{$no+1}}.</th>
                        <td><b>{{$data->jaminan}}</b></td>
                        <th>{{$data->jumlahJaminan}}</th>
                    </tr>
                @endforeach
                
               
            </table>
        </div>

        <div width="100%" style="margin-top:100px;">
        <div class="padding-top:30px;" style="page-break-before:always;">
            <h3 style="text-align: center;  font-family:Arial, Helvetica, sans-serif; text-transform: uppercase;" >Daftar Nama Pasien</h3>
        <table border=1 border-collapse=0 border-style="dotted" class=" margin-top:100px; table table-sm table-striped" style="margin-top:30px;font-size:8pt; width:100%; font-family:Arial, Helvetica, sans-serif; font-size:9pt; text-transform: uppercase;">    
          
                <tr class="text">
                    <th style="font-size:8pt;" align="center">No</th>
                    <th style="font-size:8pt;" align="center" width="75">Tanggal</th>
                    <th style="font-size:8pt;" align="center">Rekam Medis</th>
                    <th style="font-size:8pt;" align="center" width="120">Nama</th>
                    <th style="font-size:8pt;" align="center" width="75">Tanggal Lahir</th>
                    <th style="font-size:8pt;" align="center">L/P</th>
                    <th style="font-size:8pt;" align="center">NIK</th>
                    <th style="font-size:8pt;" align="center">Poli</th>
                    <th style="font-size:8pt;" align="center">Jaminan</th>
                    <th style="font-size:8pt;" align="center">Alamat</th>
                </tr>
                @foreach ($dataKunjungan as $no=>$data )
                <tr>
                    <td  align="center" style="font-size:8pt">{{$no+1}}.</td>
                    <td  align="center" style="font-size:8pt">{{$data->tanggal}}</td>
                    <td  align="center" style="font-size:8pt">{{$data->no_Rm}}</td>
                    <td  style="font-size:8pt">{{$data->nama}}</td>
                    <td align="center" style="font-size:8pt">{{$data->tanggal_Lahir}}</td>
                    <td align="center">{{$data->jenkel}}</td>
                    <td align="center" style="font-size:8pt">{{$data->nik}}</td>
                    <td align="center">{{$data->nama_poli}}</td>
                    <td align="center" >{{$data->jaminan}}</td>
                    <td style="font-size:8pt">{{$data->alamat}}, {{$data->kel_name}}, {{$data->kec_name}}, {{$data->kota_name}}</td>
                </tr>
                @endforeach 
        </table>    
        </div>
        </div>
    </div>
</body>
</html>



 <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
        $( document ).ready(function() {
           window.print();
        });
</script>