<div class="card card-danger card-outline">
    <div class="card-header">
      <h5 class="card-title"><b>Riwayat</b> Antropometri</h5>
      <div wire:loading>
          <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-sm fas fa fa-spinner fa-spin"></i> &nbsp; Loading...</span>
      </div>
    </div>
    <div class="card-body" wire:loading.remove>
        <div class="table-responsive">
            <table class="table table-xs table-bordered text-xs text-uppercase">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Sistole</th>
                        <th class="text-center">Diastole</th>
                        <th class="text-center">Tinggi Badan</th>
                        <th class="text-center">Berat Badan</th>
                        <th class="text-center">Lingkar Perut</th>
                        <th class="text-center">Glukosa</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                @if(!empty($query))
                    @foreach($query as $i=>$data)
                        <tr>
                            <td>{{$i+1}}.</td>
                            <td>{{\carbon\carbon::parse($data->tanggal)->format('d-m-Y')}}</td>
                            <td>{{$data->sistole}}</td>
                            <td>{{$data->diastole}}</td>
                            <td>{{$data->tinggi_badan}}</td>
                            <td>{{$data->berat_badan}}</td>
                            <td>{{$data->lingkar_perut}}</td>
                            <td>{{$data->glukosa}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
  </div>
