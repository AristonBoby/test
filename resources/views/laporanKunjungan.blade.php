@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row" style="margin-bottom:-5px;">
      <div class="col-sm-6 ">
        <h5>LAPORAN KUNJUNGAN PASIEN </h5>
      </div>
      <div class="col-lg-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pasien Berdasarkan Wilayah</li>
      </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
  <div class="content">
    <div class="container-fluid">  
      <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4">
          <livewire:laporan.kunjungan.formtanggal>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
          <livewire:laporan.kunjungan.poli>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
          <livewire:laporan.kunjungan.jaminan>
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12">
          <livewire:laporan.kunjungan.table>
        </div>
        
      </div>
    </div>    
  </div>
@endsection
