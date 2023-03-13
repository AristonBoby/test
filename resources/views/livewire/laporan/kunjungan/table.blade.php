<div class="card card-purple card-outline table-responsive">
    <div class="card-header">
        <h5 class="card-title"><b>Table Daftar</b> Pasien</h5>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
            </button>

            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
            </button>
        </div>
        <div wire:loading>
            <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
        </div>
    </div>
    <div class="card-body text-sm text-center ">
        <div class="table-responsive">
            <table class="text-uppercase table table-bordered table-md text-sm table-hover table-striped">
                <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>No Rekam Medis</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Umur</th>
                            <th>Kelamin</th>
                            <th>NIK</th>
                            <th>Poli</th>
                            <th>Jaminan</th>
                            <th>Alamat</th>
                        </tr>
                </thead>
                <tbody>
                    @if(empty($varLaporanPasien))
                        <tr wire:loading.remove>
                            <td colspan="10" class="text-center"><i>Data Tidak Ditemukan</i></td>
                        </tr>
                    @endif
                    @empty(!$varLaporanPasien)
                        @foreach ($varLaporanPasien as $no=>$data)
                            <tr>
                                <td >{{$no+$varLaporanPasien->firstItem()}}.</td>
                                <td>{{\Carbon\Carbon::parse($data->tanggal)->format('d-m-Y')}}</td>
                                <td>{{$data->no_Rm}}</td>
                                <td class="text-left">{{$data->nama}}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal_Lahir)->format('d-m-Y')}}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($data->tanggal)->diffInYears($data->tanggal_Lahir)}}
                                </td>
                                <td>{{$data->jenkel}}</td>
                                <td>{{$data->nik}}</td>
                                <td>{{$data->nama_poli}}</td>
                                <td>{{$data->jaminan}}</td>
                                <td width='400' class="text-left">{{$data->alamat }}, {{ $data->kel_name }}, {{ $data->kec_name }}, {{ $data->kota_name }}</td>
                            </tr>
                        @endforeach
                    @endempty
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-10 col-sm-12 text-xs">{{ $varLaporanPasien->links() }}</div>
                <div class="col-lg-2 col-sm-12 text-center text-xs"> <p class=" text-left text-sm col-lg-12 col-md-12 col-sm-12">Showing {{$varLaporanPasien->currentPage()}} - {{$varLaporanPasien->lastPage()}} of {{$varLaporanPasien->total()}} Record</p></div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class=" text-xs btn-flat btn-xs">

        </div>
    </div>
</div>

