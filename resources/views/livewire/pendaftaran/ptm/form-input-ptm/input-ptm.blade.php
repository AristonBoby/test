@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4>INPUT DATA PTM</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Input Data PTM</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg12">
                    <livewire:pendaftaran.ptm.form-input-ptm.form-input>
                    <livewire:pendaftaran.ptm.form-input-ptm.input-diagnosa-ptm>
                </div>
                <div class="col-md-4 col-sm-4 col-lg12">
                    <livewire:pendaftaran.ptm.form-input-ptm.form-skrining-ptm>
                </div>
                <div class="col-md-4 col-sm-4 col-lg12">
                    <livewire:pendaftaran.ptm.form-input-ptm.riwayat-antropometri>
                </div>
            </div>
        </div>
    </div>
@endsection


