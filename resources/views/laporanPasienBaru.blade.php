@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row" style="margin-bottom:-5px;">
      <div class="col-sm-6 ">
        <h5>LAPORAN PETUGAS PENDAFTARAN</h5>
      </div>
      <div class="col-lg-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Laporan Petugas Pendaftaran</li>
      </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
  <div class="content">
    <div class="container-fluid">  
      <div class="row">
        <div class="col-md-12 col-lg-4 col-sm-12">
          <livewire:laporan.daftarpasien.pencarian>
        </div>
        <div class="col-md-12 col-lg-8 col-sm-12">
          <livewire:laporan.daftarpasien.tabel>
        </div>
        <div class="col-md-8 col-lg-12 col-sm-12">
          <!--<livewire:laporan.daftarpasien.pasien> -->
        </div>
      </div>
    </div>    
  </div>
@endsection
