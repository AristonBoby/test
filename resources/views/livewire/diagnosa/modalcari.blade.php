    <div wire:ignore.self class="modal fade" id="modalcaridiagnosa" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Diagnosa Penyakit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row ">
                        <div class="col-lg-12 row">
                            <label class="label-text text-xs col-md-4 text-right">Cari Diagnosa Penyakit</label>
                            <div class="col-md-6">
                                <input wire:model='cariicd' class=" text-xs form-control form-control-sm rounded-0" placeholder="Pencarian Diagnosa Penyakit">
                            </div>
                            <p class=" col-md-12 text-danger text-xs text-center">*Pencarian Diagnosa Penyakit</p>
                        </div>    
                        <table class="table text-xs table-sm table-bordered" style="width:80%; margin:0 auto; margin-top:30px;">
                            <tr>
                                <th>No.</th>
                                <th>Code</th>
                                <th>Diagnosa</th>
                            </tr>   
                            @foreach ( $diag as $no=>$data )
                                <tr>
                                    <td>{{$no+1}}</td>
                                    <td>{{$data->icd_code}}</td>
                                    <td>{{$data->diagnosa}}</td>
                                </tr>              
                            @endforeach
                        </table>
                        {{$diag->links()}}
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm float-right rounded-0" data-dismiss="modal">Tutup</button>
                </div>
            </div>  
        </div>
    </div>