@extends('layouts.app')

@section('breadcrumb')
<div class="container-fluid">
    <div class="row" style="margin-bottom:-5px;">
      <div class="col-sm-6">
        <h5>MANAJEMEN JAMINAN</h5>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Manajemen Jaminan</li>
        </ol>
      </div><!-- /.container-fluid -->
    </div>
</div>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <livewire:jaminan.table>
                <livewire:jaminan.tabel-jaminan>
            </div>
        </div>
    </div>
@endsection