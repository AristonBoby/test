@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row" style="margin-bottom:-5px;">
      <div class="col-sm-2">
        <h5>PENCARIAN DATA PASIEN </h5>
      </div>
      <div class="col-lg-8">
        <marquee class="text-danger"><b> Pencetakan General Consent Pada Menu Pasien->Pendaftaran Pasien </b></marquee>
    </div>
      <div class="col-sm-2">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pencarian Pasien</li>
        </ol>
      </div><!-- /.container-fluid -->
    </div>
</div>
@endsection
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <livewire:pendaftaran.pasien.components.datapasien>
    </div>
  </div>
</div>

@endsection
