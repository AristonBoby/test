@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>PENYAKIT TIDAK MENULAR</h4>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <livewire:diagnosa.ptm.pencarian>
                <livewire:diagnosa.ptm.form-ptm>
            </div>
        </div>
    </div>
@endsection