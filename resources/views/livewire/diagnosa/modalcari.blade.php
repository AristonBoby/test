    <div wire:ignore.self class="modal fade" id="modalcaridiagnosa" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Diagnosa Penyakit</h5>
                    <div wire:loading>
                        <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-sm fas fa fa-spinner fa-spin"></i> &nbsp; Loading...</span>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row ">
                        <div class="col-lg-12 row">
                            <label class="label-text text-sm col-md-4 text-right">Cari Diagnosa</label>
                            <div class="col-md-6">
                                <input wire:model='cariicd' class=" text-sm form-control form-control-sm rounded-0" placeholder="Pencarian Diagnosa Penyakit">
                            </div>
                            <p class=" col-md-12 text-danger text-xs text-center">*Pencarian Diagnosa Penyakit</p>
                        </div>    
                        <div class=" table-responsive">
                            <table class="table text-xs table-sm table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="90">Code</th>
                                        <th class="text-center">Diagnosa</th>
                                    </tr>
                                </thead>   
                                @foreach ( $diag as $no=>$data )
                                    <tr>
                                        <td><button class="btn btn-xs btn-flat btn-default" style="width:60px;"><b>{{$data->icd_code}}</b></button></td>
                                        <td>{{$data->diagnosa}}</td>
                                    </tr>              
                                @endforeach
                            </table>
                        </div>
                        <div class="text-xs mt-3 float-left">
                            {{$diag->links()}}
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm float-right rounded-0" data-dismiss="modal">Tutup</button>
                </div>
            </div>  
        </div>
    </div>