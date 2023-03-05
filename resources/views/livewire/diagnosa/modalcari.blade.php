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
                    <div class="form-group">
                            <div class="row">
                                <label class="label-text text-md col-md-2 text-right">Diagnosa</label>
                                <div class="col-md-8">
                                    <div class="input-group input-group-md">
                                        <input wire:model='cariicd' class=" text-sm form-control form-control rounded-0" placeholder="Pencarian Diagnosa Penyakit">
                                    </div>
                                </div>
                            </div>

                        <div class=" mt-3 table-responsive">
                            <table class="table text-xs table-sm table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="90">Code</th>
                                        <th class="text-center">Diagnosa</th>
                                    </tr>
                                </thead>
                                @empty(!$diag)
                                    @foreach ($diag as $data)
                                        <tr>
                                            <td><button type="button" wire:click="dataDiagnosa('{{$data->icd_code}}')" class="btn btn-xs btn-flat btn-default" style="width:60px;"><b>{{$data->icd_code}}</b></button></td>
                                            <td>{{$data->diagnosa}}</td>
                                        </tr>
                                    @endforeach
                                @endempty
                            </table>
                        </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm float-right "data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                </div>
            </div>
        </div>
    </div>
<script>
    window.addEventListener('closeModal', event => {
        $("#modalcaridiagnosa").modal('hide');
   });
</script>
