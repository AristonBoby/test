@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row" style="margin-bottom:-5px;">
      <div class="col-sm-6 ">
        <h5>LAPORAN KUNJUNGAN PASIEN</h5>
      </div>
      <div class="col-lg-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Laporan Kunjungan</li>
      </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <livewire:laporan.laporankunjungan>
      </div>
    </div>
  </div>
@endsection
