@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>KUNJUNGAN PASIEN</h4>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="row">
    <livewire:pendaftaran.kunjungan.forminput>
    <livewire:pendaftaran.kunjungan.tabelkunjungan>
    <livewire:pendaftaran.kunjungan.modalcaripasien>
</div>
@endsection
