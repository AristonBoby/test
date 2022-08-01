<div>
@extends('layouts.app')
@section('content')
<div class="card"> 
  <div class="card-header">
    <h5 class="card-tiitle">Laporan Kunjungan Pasien</h5>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label class="form-label col-md-1 text-sm"> Dari Tanggal</label>
          <div class="col-md-2">
              <div class="input-group mb-3">
                  <input type="date" class="form-control form-control-sm">
              </div>
          </div>
          <label class="form-label col-md-1 text-sm"> Dari Tanggal</label>
          <div class="col-md-2">
              <div class="input-group mb-3">
                <input type="date"  class=" form-control form-control-sm">
                
              </div>
          </div>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th>Poli</th>
          <th style="width: 40px">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1.</td>
          <a class="btn" wire:click="laporanpoli">Cari</a>
          <td>Pemeriksaan Umum</td>
          <td><span class="badge bg-success"></span></td>
        </tr>
        <tr>
          <td>2.</td>
          <td>Pemeriksaan Gigi Dan Mulut</td>
          <td><span class="badge bg-success">10</span></td>
        </tr>
        <tr>
          <td>3.</td>
          <td>Pemeriksaan KIA</td>
          <td><span class="badge bg-success">10</span></td>
        </tr>
        <tr>
          <td>4.</td>
          <td>Pemeriksaan Lansia</td>
          <td><span class="badge bg-success">10</span></td>
        </tr>
      </tbody>
    </table>
</div>
</div>
@endsection
</div>