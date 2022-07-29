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
                    <div class="form-group row center text-center offset-md-1 offset-sm-0">
                        <label class="label-text text-sm col-lg-3 col-sm-4">Cari Diagnosa Penyakit</label>
                        <input wire:modal='caridiagnosa' class=" col-lg-5 col-sm-4 text-sm form-control form-control-sm rounded-0" placeholder="Pencarian Diagnosa Penyakit">
                        <button type="submit" wire:click="modaldiagnosa" class="col-sm-1 btn btn-sm btn-primary rounded-0">Cari</button>
                    </div>
                <p class="text-danger text-sm text-center">*Pencarian Diagnosa Penyakit</p>
                        <table class="table text-sm">
                            <tr>
                                <th>Code</th>
                                <th>Diagnosa</th>
                            </tr>   
                            @if(!empty($franchiseList) && $links->links())
                                @foreach ($diagnosa as $data)
                                    <tr>
                                        <td>{{$data->icd_code}}</td>
                                    </tr>
                                @endforeach
                            @endif          
                        </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm float-right rounded-0" data-dismiss="modal">Tutup</button>
                </div>
            </div>  
        </div>
    </div>