@extends('layouts.app')
@section('breadcrumb')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 ">
        <h5>MANAJEMEN POLI</h5>
      </div>
      <div class="col-lg-6">

      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <livewire:poli.forminput>
      </div>
    </div>
  </div>
@endsection
