@extends('layouts.app')

@section('breadcrumb')
<div class="container-fluid">
    <div class="row" style="margin-bottom:-5px;">
      <div class="col-sm-6">
        <h5><b>PENDAFTARAN</b> PTM</h5>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pendaftaran PTM</li>
        </ol>
      </div><!-- /.container-fluid -->
    </div>
</div>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div style="font-family:sans-serif row">
                    <div class="col-lg-3 col-sm-12 col-md-12">
                        <livewire:pendaftaran.ptm.form-cari>
                        <livewire:pendaftaran.ptm.forminput>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
