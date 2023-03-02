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
          <div class="col-lg-4 col-sm-12 col-md-12">
            <livewire:pendaftaran.ptm.form-cari>
            <livewire:pendaftaran.ptm.forminput>
          </div>
            <livewire:pendaftaran.ptm.table-daftar>
      </div>
    </div>
  </div>
@endsection
<script>
    window.addEventListener('alert', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.icon,
            showConfirmButton: false,
            timer: event.detail.timer,
            buttons: false,
        });
    });

</script>
