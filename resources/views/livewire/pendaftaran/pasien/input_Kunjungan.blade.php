@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3>KUNJUNGAN PASIEN</h3>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="row">
  <livewire:pendaftaran.pasien.components.kunjungan>
  <livewire:kunjungan.tabel>
  <livewire:modal-cari-paisen>
</div>
@endsection
