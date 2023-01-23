@extends('layouts.app')

@section('breadcrumb')
<div class="container-fluid">
    <div class="row" style="margin-bottom:-5px;">
      <div class="col-sm-6">
        <h5><b>PENDAFTARAN</b> PENYAKIT TIDAK MENULAR</h5>
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
                <div class="col-lg-4 col-md-8 col-sm-12 text-xs" style="font-family:sans-serif">  
                    <livewire:pendaftaran.ptm.form-cari>
                    <livewire:pendaftaran.ptm.forminput>
                    <livewire:pendaftaran.ptm.form-table>
                </div>
            </div>
        </div>
    </div>
@endsection
