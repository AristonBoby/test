<div class="card">
   <div class="card-header">
        <h5 class="card-title">Laporan Pendaftaran Pasien</h5>
   </div>
   <div class="card-body">
        <table class="table border text-center text-sm table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tr wire:loading>
                <td>Loading ...</td>
            </tr>
            <tbody wire:loading.remove>
                @if(!empty($pasien))
                     @foreach ($pasien as $no=>$data)
                <tr>
                    <td>{{$no+1}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->jumlah}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
   </div>
</div>
