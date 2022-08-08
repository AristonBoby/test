@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>PENCARIAN DATA PASIEN </h3>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="row">
    <livewire:pendaftaran.pasien.components.datapasien>
@endsection
