<div class="col-md-8 col-lg-8 col-sm-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title"><b>Tabel Data</b> Jaminan</h5>
            <div wire:loading>
                <span class="badge bg-success text-sm"style="margin-left:5px;"> <i class="text-sm fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12 col-sm-12 col-lg-12 mb-5 " style="margin-top:-15px;">
                <button wire:click='render()' class="btn btn-primary float-right btn-flat btn-sm text-xs">><i class=" text-xs fa fa fa-sync-alt"></i> Refresh</button>
            </div>
            <table class="table table-sm table-bordered text-sm table-hover table-striped"style="margin-top:-25px;">
                <thead>
                    <tr>
                        <th width="8">No</th>
                        <th width="800">Jaminan</th>
                        <th width="80" class="text-center">Status</th>
                        <th width="5"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jaminan as $no=>$data)
                    <tr>
                        <td  class="text-center">{{$jaminan->firstItem()+$no}}.</td>
                        <td >{{$data->jaminan}}</td>
                        <td class="text-center">@if ($data->status == '0')
                                <span class="badge bg-success">Aktif</span>
                            @else   
                            <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                            </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-sm bg-warning"><i class="fas fa-edit text-xs"></i></a>
                                <a class="btn btn-sm bg-danger"><i class="fas fa-light fa-trash-alt text-xs"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-5 float-right">{{$jaminan->links()}}</div>
        </div>
    </div>  
</div>
