<div class="col-md-12 col-sm-12 col-lg-8">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Daftar</b>PTM</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-sm table-hover text-sm text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tgl Lahir</th>
                        <th>Umur</th>
                        <th>Kelamin</th>
                        <th>NIK</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ( $ptm as $no => $data )
                <tbody>
                    <tr>
                        <td>{{$ptm->firstItem()+$no}}</td>
                        <td>{{$data->nama}}</td>   
                        <td>{{\Carbon\Carbon::parse($data->tanggal_Lahir)->format('d-m-Y')}}</td>
                        <td>{{\Carbon\Carbon::parse($data->tanggal_Lahir)->age}}</td>
                        <td>{{$data->jenkel}}</td>
                        <td>{{$data->nik}}</td>
                        <td><button class="btn btn-primary btn-sm">Skrining</button></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
