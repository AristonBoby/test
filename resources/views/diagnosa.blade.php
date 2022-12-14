@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>DIAGNOSA PASIEN</h4>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <livewire:diagnosa.formdiagnosa>
                <livewire:diagnosa.tabel>
                <livewire:diagnosa.modalcari>
            </div>
        </div>
    </div>
@endsection