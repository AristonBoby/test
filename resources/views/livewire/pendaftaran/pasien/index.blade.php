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
    <div class="row">
      <livewire:pendaftaran.pasien.components.pasienbaru>
      <livewire:pendaftaran.pasien.components.editdata-pasien>
    </div>
  </div>
</div>
@endsection
