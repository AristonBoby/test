    <div wire:ignore.self class="modal modal fade" id="generalconsent" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"><b>GENEREAL</b> CONSENT</h5>
            <div wire:loading>
                <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <form wire:submit.prevent='generalconsent'>
                    <div class="form-group row">
                        <label class="col-md-3 label-control">Penanggung Jawab</label>
                        <div class="col-md-9">
                            <select wire:model.defer='status' class="form-control-sm form-control rounded-0">
                                <option value="" selected disabled>-- Pilih Salah Satu --</option>
                                <option value="Pasien">Pasien</option>
                                <option value="Keluarga Pasien">Keluarga Pasien</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control">Nama</label>
                        <div class="col-md-9">
                            <input type="text" wire:model.defer='valNamaGeneral' class="form-control rounded-0 form-control-sm">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 label-control">Jenis Kelamin</label>
                        <div class="col-md-9">
                            <select class="form-control-sm form-control rounded-0">
                                <option value="" selected disabled>-- Pilih Salah Satu --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 label-control">Alamat</label>
                        <div class="col-md-9">
                            <textarea type="text" class="form-control rounded-0 form-control-sm"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 label-control">Nomor Telepon / HP</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control rounded-0 form-control-sm">
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-sm float-right rounded-0"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
          </div>
        </div>
      </div>

