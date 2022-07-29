@extends('layouts.app')
@section('breadcrumb')
      <div class="row">
        <div class="col-sm-6">
          <h3>Pendaftaran Pasien</h3>
        </div>
      </div>  
@endsection
@section('content')
<div class="row">
  <livewire:pendaftaran.pasien.components.pasienbaru>
  <livewire:pendaftaran.pasien.components.editdata-pasien>
</div>
@endsection
