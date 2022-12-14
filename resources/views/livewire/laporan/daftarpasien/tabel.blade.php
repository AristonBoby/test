<div class="card card-danger card-outline">
   <div class="card-header">
        <h5 class="card-title">Laporan Pendaftaran Pasien Baru</h5>
   </div>
   <div class="card-body">
    @empty(!$pasien)
        <table class="table bordered text-center text-sm table-sm hover">
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
                
                    @foreach ($pasien as $no=>$data)
                        <tr>
                            <td>{{$no+1}}.</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->jumlah}} Pasien</td>
                        </tr>
                    @endforeach      
            </tbody>
        </table>
    @endempty 
   </div>
</div>
