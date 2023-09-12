@extends('layouts.app')
@section('breadcrumb')
      <div class="row " style="margin-bottom:-5px;">
        <div class="col-lg-2">
          <h5>PENDAFTARAN PASIEN</h5>
        </div>
        <div class="col-lg-8">
            <marquee class="text-danger"><b> Pencetakan General Consent Pada Menu Pasien->Pendaftaran Pasien </b></marquee>
        </div>
        <div class="col-sm-2">
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
    <div class="row">
      <div class="col-md-4 col-lg-4 col-sm-12">
        <livewire:pendaftaran.pasien.components.cek-pasien-baru>
        <livewire:pendaftaran.pasien.components.pasienbaru>
      </div>
      <livewire:pendaftaran.pasien.components.editdata-pasien>
    </div>
  </div>
</div>
@endsection
