@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row" style="margin-bottom: -5px;">
      <div class="col-lg-2">
        <h5>KUNJUNGAN PASIEN</h5>
      </div>
      <div class="col-lg-8">
        <marquee class="text-danger"><b> Pencetakan General Consent Pada Menu Pasien->Pendaftaran Pasien </b></marquee>
    </div>
      <div class="col-lg-2">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Kunjungan Pasien</li>
      </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
        <livewire:pendaftaran.kunjungan.forminput>
        <livewire:pendaftaran.kunjungan.riwayat-kunjungan>
        <livewire:pendaftaran.kunjungan.tabelkunjungan>
        <livewire:pendaftaran.kunjungan.modalcaripasien>
    </div>
  </div>
</div>
@endsection
