<div class="col-md-8 col-lg-8 col-sm-12">
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Data Jaminan</h5>
        </div>
        <div class="card-body">
            <div class="col-md-12 col-sm-12 col-lg-12 mb-5">
                <button wire:click='render()' class="btn btn-primary float-right btn-flat btn-sm">Refresh</button>
            </div>
            <table class="table table-sm table-bordered text-center">
                <tr>
                    <th>No</th>
                    <th>ID Jaminan</th>
                    <th>Jaminan</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                <tbody>
                    <tr wire:loading>
                        <td>Loading...</td>
                    </tr>
                    @foreach ($jaminan as $no=>$data)
                    <tr wire:loading.remove>
                        <td>{{$jaminan->firstItem()+$no}}</td>
                        <td>{{$data->id_jaminan}}</td>
                        <td>{{$data->jaminan}}</td>
                        <td>@if ($data->status == '0')
                                <span class="badge bg-success">Aktif</span>
                            @else   
                            <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                            </td>
                        <td>
                            <a class="btn btn-flat btn-xs bg-warning"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-flat btn-xs bg-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-5 float-right">{{$jaminan->links()}}</div>
        </div>
    </div>  
</div>
