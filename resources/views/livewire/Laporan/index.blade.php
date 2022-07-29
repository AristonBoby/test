@extends('layouts.app')
@section('content')
<div class="card"> 
  <div class="card-header">
    <h3 class="card-tiitle">Laporan Kunjungan Pasien</h3>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label class="form-label col-md-1 text-sm"> Tanggal</label>
          <div class="col-md-2">
              <div class="input-group mb-3">
                  <input type="text" value = "" class="txttanggal form-control form-control-sm">
                  <div class="input-group-append">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      <button class="btn btn-sm btn-primary" >Refresh</button>
                  </div>
              </div>
          </div>
  </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Task</th>
          <th style="width: 40px">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1.</td>

          <td>Ruangan Pemeriksaan Umum</td>
          <td><span class="badge bg-success">{{$kunjungan->co}}</span></td>
        </tr>
        <tr>
          <td>2.</td>
          <td>Ruangan Pemeriksaan Gigi Dan Mulut</td>
          <td><span class="badge bg-success">10</span></td>
        </tr>
        <tr>
          <td>3.</td>
          <td>Ruangan Pemeriksaan KIA</td>
          <td><span class="badge bg-success">10</span></td>
        </tr>
        <tr>
          <td>4.</td>
          <td>Ruangan Pemeriksaan Lansia</td>
          <td><span class="badge bg-success">10</span></td>
        </tr>
      </tbody>
    </table>
</div>
</div>
@endsection
