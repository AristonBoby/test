<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .text-center{
            text-align: center;
            font-size: 11.5pt;
            font-family: calibri;
        }
        #logo1{
            position: absolute;
            top:20px;
            left:40px;
            width:2.2cm;
            height:2.2cm;
        }
        #logo2{
            position: relative;
            width:2.2cm;
            height:2.2cm;
            top:35px;
            left:35px;
        }
        html{
        width: 8.5in;
        height: 5in;
        left:-3cm;
        }
        @media print {
                h1 {page-break-after: always;}

                }
        }
        table, tr, td {
                border: 1px solid black;
                border-collapse: collapse;
        }
    </style>

@foreach ($data as $query)

    <title>{{$query->no_Rm}}_{{$query->nama}}</title>
</head>
<body>

    <table border="1" style="width:100%; border-collapse: collapse;" collapse="0">
        <tr>
            <td text-center class="text-center" colspan="3">PEMERINTAH KOTA SAMARINDA</td>
        </tr>
        <tr>
            <td class="text-center" colspan="3">DINAS KESEHATAN KOTA</td>
            <img id="logo1"  src="{{asset('logo/pemkot.png')}}">
        </tr>
            <td class="text-center" colspan="3"><b>UPTD PUSKESMAS SEGIRI<b></td>
        </tr>
        <tr>
            <td class="text-center" colspan="3">Jalan Ramania 2 RT. 47 No. 12, Kelurahan Sidodadi, Kecamatan Samarinda Ulu</td>
        </tr>
        <tr>
            <td class="text-center" colspan="3">HP. 081253721754, Email : pkmsegiri@yahoo.com</td>
        </tr>
        <tr height="40" style="border-bottom:none">
            <td class="text-center" colspan="3"><b style="font-size: 12pt"> REKAM MEDIS </b></td>
        </tr>


        <tr height="30" style="border-bottom:px">
            <td class="text-center" style="text-align:right;" colspan="3" ><b>Nomor Rekam Medis :</b><b style="margin-right:20px; font-size:14pt;">  {{$query->no_Rm}} </b></td>
        </tr>
        <tr style="border-top:3pt;" height="22">
            <td class="text-center" style="text-align:left; width:1%;">&nbsp; NAMA</td>
            <td class="text-center" style="text-align:center; width:1%">:</td>
            <td class="text-center" style="text-align:left;"> &nbsp; {{$query->nama}}</td>
        </tr>
        <tr height="22">
            <td class="text-center" style="text-align:left; width:30%;">&nbsp; Tempat Lahir, Tanggal Lahir</td>
            <td class="text-center" style="text-align:center alig; width:1%">:</td>
            <td class="text-center" style="text-align:left;"> &nbsp; {{$query->tempat_Lahir}}, &nbsp; {{$tgl_Lahir, }}</td>

        </tr>
        <tr height="22">
            <td class="text-center" style="text-align:left;">&nbsp; Jenis Kelamin</td>
            <td class="text-center" style="text-align:center; width:1%">:</td>
            <td class="text-center" style="text-align:left;">&nbsp; @if($query->jenkel == "L") Laki-laki @else Perempuan @endif</td>
        </tr>
        <tr height="22">
            <td class="text-center" style="text-align:left;">&nbsp; Kepala Keluarga</td>
            <td class="text-center" style="text-align:center; width:1%">:</td>
            <td class="text-center" style="text-align:left;"> &nbsp; {{$query->kepala_keluarga}}</td>
        </tr>
        <tr height="22">
            <td class="text-center" style="text-align:left;">&nbsp; Agama</td>
            <td class="text-center" style="text-align:center; width:1%">:</td>
            <td class="text-center" style="text-align:left;"> &nbsp; {{$query->agama}}</td>
        </tr>
        <tr height="22">
            <td class="text-center" style="text-align:left;">&nbsp; Pekerjaan</td>
            <td class="text-center" style="text-align:center; width:1%">:</td>
            <td class="text-center" style="text-align:left;"> &nbsp; {{$query->pekerjaan}}</td>
        </tr>
        <tr height="22">
            <td class="text-center" style="text-align:left;">&nbsp; NIK</td>
            <td class="text-center" style="text-align:center; width:1%">:</td>
            <td class="text-center" style="text-align:left;"> &nbsp; {{$query->nik}}</td>
        </tr>
        <tr height="22">
            <td class="text-center" style="text-align:left;">&nbsp; Nomor BPJS</td>
            <td class="text-center" style="text-align:center; width:1%">:</td>
            <td class="text-center" style="text-align:left;"> &nbsp; {{$query->bpjs}}</td>
        </tr>
        <tr height="22">
            <td class="text-center" style="text-align:left;">&nbsp; Alamat</td>
            <td class="text-center" style="text-align:center; width:1%">:</td>
            <td class="text-center" style="text-align:left;"> &nbsp; {{$query->alamat}}</td>
        </tr>
        <tr height="22">
            <td class="text-center" style="text-align:left;">&nbsp; No. Tlpn./HP</td>
            <td class="text-center" style="text-align:center; width:1%">:</td>
            <td class="text-center" style="text-align:left;"> &nbsp; {{$query->no_tlpn}}</td>
        </tr>
        <tr height="22">
            <td class="text-center" style="text-align:left;">&nbsp; Golongan Darah</td>
            <td class="text-center" style="text-align:center; width:1%">:</td>
            <td class="text-center" style="text-align:left;"> &nbsp;</td>
        </tr>
        <tr height="22">
            <td class="text-center" style="text-align:left;">&nbsp; Alergi</td>
            <td class="text-center" style="text-align:center; width:1%">:</td>
            <td class="text-center" style="text-align:left;"> &nbsp;</td>
        </tr>
    </table>
    <table  border="1" style="width:100%; border-collapse: collapse; margin-top:3px;" collapse="0">
        <tr>
           <td class="text-center" >Riwayat Penyakit Terdahulu</td>
           <td class="text-center" >Riwayat Penyakit Keluarga</td>
        </tr>
        <tr>
            <td class="text-center" style="text-align:left; padding-left:75px;" >1. Hipertensi</td>
            <td class="text-center" style="text-align:left; padding-left:75px;" >1. Hipertensi</td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:75px;" >2. Diabetes Mellitus</td>
            <td class="text-center" style="text-align:left; padding-left:75px;" >2. Diabetes Mellitus</td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:75px;" >3. Jantung</td>
            <td class="text-center" style="text-align:left; padding-left:75px;" >3. Jantung</td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:75px;" >4. Paru</td>
            <td class="text-center" style="text-align:left; padding-left:75px;" >4. Paru</td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:75px;" >5. Kelainan Darah</td>
            <td class="text-center" style="text-align:left; padding-left:75px;" >5. Kelainan Darah</td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:75px;" >6. Penyakit Hati/Liver</td>
            <td class="text-center" style="text-align:left; padding-left:75px;" >6. Penyakit Hati/Liver</td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:75px;" >7. Kanker</td>
            <td class="text-center" style="text-align:left; padding-left:75px;" >7. Kanker</td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:75px;">8. ..................................................</td>
            <td class="text-center" style="text-align:left; padding-left:75px;">8. ..................................................</td>
         </tr>
    </table>
    <table border="1" style="width:100%; border-collapse: collapse; margin-top:20px;" collapse="0">
        <tr>
            <td class="text-center" colspan="2" style="background-color:rgb(221, 217, 196)"">PENGKAJIAN PSIKOLOGIS DAN SOSIAL</td>
        </tr>
        <tr>
            <td class="text-center" colspan="2" style="text-align:left; padding-left:20px;"> PENGKAJIAN PSIKOLOGIS</td>
        </tr>
        <tr>
            <td class="text-center" style="text-align:left; padding-left:100px;" rowspan="3" >Adakah kondisi</td>
            <td class="text-center" style="text-align:left; padding-left:20px;" >1. Tidak Semangat &nbsp; &nbsp; &nbsp; 2. Rasa Tertekan &nbsp; &nbsp; &nbsp; 3. Depresi &nbsp; &nbsp; &nbsp; 4. Susah Tidur</td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:20px;" >5. Cepat Lelah &nbsp; &nbsp; &nbsp; 6. Sulit Konsentrasi &nbsp; &nbsp; &nbsp; 7. Sulit Berbicara </td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:20px;" >8. Merasa Bersalah &nbsp; &nbsp; &nbsp; 9. Cemas</td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:20px;" >Ada gangguan jiwa masa lalu</td>
            <td class="text-center" style="text-align:left; padding-left:20px;" >1. Ya &nbsp; &nbsp; &nbsp; 2. Tidak</td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:20px;" >Ada keluarga yang gangguan jiwa</td>
            <td class="text-center" style="text-align:left; padding-left:20px;" >1. Ya &nbsp; &nbsp; &nbsp; 2. Tidak</td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:20px;" rowspan="3" >Adakah perilaku</td>
            <td class="text-center" style="text-align:left; padding-left:20px;" >1. Kekerasan &nbsp; &nbsp; &nbsp; 2. Halusinasi &nbsp; &nbsp; &nbsp; 3.Waham &nbsp; &nbsp; &nbsp; 4. Mood Disorder</td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:20px;" >5. Gangguan Memori &nbsp; &nbsp; &nbsp; 6. Gangguan Kesadaran </td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:20px;" >7. Gangguan Interaksi Sosial &nbsp; &nbsp; &nbsp; 8. Gangguan Konsentrasi Berhitung</td>
         </tr>
         <tr>
            <td class="text-center" colspan="2" style="text-align:left; padding-left:20px;"> KONDISI SOSIAL</td>
        </tr>
        <tr>
            <td class="text-center" style="text-align:left; padding-left:20px;" >Status pernikahan</td>
            <td class="text-center" style="text-align:left; padding-left:20px;" >1. Menikah &nbsp; &nbsp; &nbsp; 2. Belum Menikah &nbsp; &nbsp; &nbsp; 3. Janda/Duda </td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:20px;"  >Tinggal dengan</td>
            <td class="text-center" style="text-align:left; padding-left:20px;" >1. Sendiri &nbsp; &nbsp; 2. Orang Tua &nbsp; &nbsp; 3. Suami/Istri &nbsp; &nbsp; 4. .................... </td>
         </tr>
         <tr>
            <td class="text-center" colspan="2" style="text-align:left; padding-left:20px;"> Keluarga terdekat .................................................. Hubungan .................... No. Telp./HP ..............................</td>
        </tr>
        <tr>
            <td class="text-center" style="text-align:left; padding-left:20px;" >Curiga penganiayaan/penelantaran</td>
            <td class="text-center" style="text-align:left; padding-left:20px;" >1. Ya &nbsp; &nbsp; &nbsp; 2. Tidak </td>
         </tr>
         <tr>
            <td class="text-center" style="text-align:left; padding-left:20px;" >Curiga penganiayaan/penelantaran</td>
            <td class="text-center" style="text-align:left; padding-left:20px;" >1. Ya &nbsp; &nbsp; &nbsp; 2. Tidak </td>
         </tr>
         <tr>
            <td class="text-center" colspan="2" style="text-align:left; padding-left:20px;"> Kegiatan ibadah : .................................................. </td>
        </tr>
        <tr>
            <td class="text-center" colspan="2" style="text-align:left; padding-left:20px;"> Nilai-nilai yang bertanggung jawab dengan kebutuhan kesehatan : .................................................. </td>
        </tr>
    </table>
    <div style="page-break-before:always;">

        <table border="1" style="width:100%; margin-top:-60px; border-collapse: collapse;" collapse="0">
            <tr>
                <td text-center class="text-center" colspan="3">PEMERINTAH KOTA SAMARINDA</td>
            </tr>
            <tr>
                <td class="text-center" colspan="3">DINAS KESEHATAN KOTA</td>
                <img id="logo2"  src="{{asset('logo/pemkot.png')}}">
            </tr>
                <td class="text-center" colspan="3"><b>UPTD PUSKESMAS SEGIRI<b></td>
            </tr>
            <tr>
                <td class="text-center" colspan="3">Jalan Ramania 2 RT. 47 No. 12, Kelurahan Sidodadi, Kecamatan Samarinda Ulu</td>
            </tr>
            <tr>
                <td class="text-center" colspan="3">HP. 081253721754, Email : pkmsegiri@yahoo.com</td>
            </tr>
        </table>
        <table style="width:100%; margin-top:5px;border-collapse: collapse;" collapse="0">
            <tr>
                <td><b>Dengan ini saya menyatakan bahwa :</b></td>
            </tr>
            <tr>
                <td>1. Data yang saya/pengantar saya isi adalah benar.</td>
            </tr>
            <tr>
                <td>2. Telah mendapatkan penjelasan serta mendapatkan leaflet tentang hak dan kewajiban pasien di Puskesmas Segiri</td>
            </tr>
            <tr>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;seperti tercantum dalam lembar ini.</td>
            </tr>
        </table>
        <table border="1" style="width:100%; border-collapse: collapse; margin-top:20px;" collapse="0">
            <tr style="">
                <td text-center class="text-center" style="text-align:left;" colspan="2"><b>Hak Pasien :</b></td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" width:1%;text-align:left; width:1px;border-botom:0px; border-top:0px;" colspan="">1.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:none; border-top:0px;" colspan="3">Memperoleh informasi mengenai tata tertib dan peraturan yang berlaku.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:none;" colspan="">2.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:none;" colspan="3">Memperoleh informasi tentang hak dan kewajiban pasien.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:none;" colspan="">3.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:none;" colspan="3">Memperoleh pelayanan yang manusiawi, adil, jujur dan tanpa diskriminasi.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:none;" colspan="">4.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:none;" colspan="3">Memperoleh pelayanan kesehatan yang bermutu sesuai dengan standar profesi dan standar prosedur operasional.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">5.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="3">Memperoleh pelayanan yang efektif dan efisien sehingga pasien terhindar dari kerugian fisik dan materi.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">6.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="3">Mengajukan pengaduan atas kualitas pelayanan yang didapatkan.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">7.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="3">Memilih petugas bila menginginkannya.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">8.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="3">Meminta konsultasi tentang penyakit yang dideritanya kepada dokter lain (second opinion) yang memiliki Surat Izin Praktik (SIP) baik di dalam maupun di luar Puskesmas.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">9.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="3">Memberikan privasi dan kerahasiaan penyakit yang diderita termasuk data medisnya.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">10.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="3">Memberikan persetujuan atau menolak atas tindakan/pengobatan yang akan dilakukan oleh tenaga kesehatan terhadap penyakit yang dideritanya.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">11.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="3">Mendapat informasi yang meliputi diagnosa dan tata cara tindakan medis, tujuan tindakan medis, alternatif tindakan, risiko dan komplikasi yang mungkin terjadi, dan diagnosa terhadap tindakan yang dilakukan serta perkiraan biaya pengobatan.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">12.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="3">Didampingi keluarganya dalam keadaan kritis.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">13.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="3">Menjalankan ibadah sesuai agama atau kepercayaan yang dianutnya selama hal itu tidak mengganggu pasien lainnya.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">14.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="3">Memperoleh keamanan dan keselamatan dirinya selama dalam perawatan, mengajukan usul, saran, perbaikan, atas perlakuan Puskesmas terhadap dirinya.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style="text-align:left;" colspan="2"><b>Kewajiban Pasien :</b></td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">1.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="3">Memberi informasi yang lengkap dan jujur tentang masalah kesehatannya.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">2.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="3">Mematuhi nasehat dan petunjuk dokter dan dokter gigi.</td>
            </tr>
            <tr>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">3.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="3">Mematuhi ketentuan yang berlaku di sarana pelayanan kesehatan.</td>
            </tr>
        </table>
        <table  style="width:100%; border-collapse: collapse; margin-top:2px;" collapse="0">
            <tr style="border:none">
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">c.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">Saya menyetujui untuk mendapatkan pelayanan kesehatan di Puskesmas Segiri dan memberikan kuasa kepada Puskesmas Segiri, dokter, dokter gigi, perawat dan tenaga kesehatan lainnya untuk memberikan pelayanan kesehatan yang bermutu dan aman, sesuai dengan standar prosedur operasional kepada diri saya.</td>
            </tr>
            <tr style="border:none">
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">d.</td>
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="">Tanggung jawab untuk pembayaran. Saya mengizinkan Puskesmas untuk menagih pembayaran terhadap pelayanan	medis yang telah diberikan kepada saya, apabila asuransi atau jaminan tidak menanggung biaya, saya bertanggung jawab membayar biaya yang ditanggung tersebut.</td>
            </tr>
            <tr height="3px">
                <td text-center class="text-center" style=" text-align:left; border-botom:0px; border-top:0px;" colspan="2">Pernyataan ini saya buat dengan sebenarnya dalam keadaan sadar dan tanpa paksaan dari pihak manapun.
                </td>
            </tr>
        </table>
        <table  style="float:right; margin-top:30px;">
            <tr style="padding-bottom:30px;">
                <td text-center class="text-center" style=" text-align:center; border-botom:0px; border-top:0px;" colspan="2">Samarinda, {{$date}}</td>
            </tr>
            <tr style="height:20px;">
                <td text-center class="text-center" style=" text-align:center; border-botom:0px; border-top:0px;" colspan="2"></td>
            </tr>
            <tr style="height:20px;">
                <td text-center class="text-center" style=" text-align:center; border-botom:0px; border-top:0px;" colspan="2"></td>
            </tr>
            <tr style="height:20px;">
                <td text-center class="text-center" style=" text-align:center; border-botom:0px; border-top:0px;" colspan="2">{{$query->nama}}</td>
            </tr>
        </table>
    </div>
    @endforeach

</body>
</html>
