@extends('layouts.app')
@section('breadcrumb')
      <div class="row " style="margin-bottom:-5px;">
        <div class="col-lg-6">
          <h5>PENDAFTARAN PASIEN</h5>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pendaftaran Pasien</li>
          </ol>
        </div>
      </div>
@endsection
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="callout callout-warning bg-warning">
      <h3 class="text-center"><u>PERHATIAN !</u></h3>
      <p class="text-center"><b>Untuk Alamat Pasien Mencantumkan RT dan Nomor Rumah & Nomor Telepon / Hp Pasien Wajib di isi</b></p>
      </div>
    <div class="row">
      <livewire:pendaftaran.pasien.components.pasienbaru>
      <livewire:pendaftaran.pasien.components.editdata-pasien>
    </div>
  </div>
</div>
@endsection
