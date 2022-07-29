@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>Diagnosa Pasien</h3>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="row">
    <livewire:diagnosa.formdiagnosa>
    <livewire:pendaftaran.kunjungan.tabelkunjungan>
    <livewire:diagnosa.tabel>
    <livewire:diagnosa.modalcari>

@endsection

