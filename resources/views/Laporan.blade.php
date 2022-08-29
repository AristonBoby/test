@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 0">
        <h4>LAPORAN KUNJUNGAN PASIEN</h4>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="row">
        <livewire:laporan.laporankunjungan>
    </div>
@endsection
