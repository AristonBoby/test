@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Data Pasien</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit Data Pasien</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection

@section('content')
 <livewire:pendaftaran.pasien.components.editdata-pasien>
@endsection
