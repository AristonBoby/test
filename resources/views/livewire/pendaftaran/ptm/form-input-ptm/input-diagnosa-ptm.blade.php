<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card card-purple card-outline">
        <div class="card-body">
            <form wire:submit.prevent='inputPtm' class="form-horizontal">
                <div class="form-group row" style="margin-bottom:-5px;">
                    <label class="form-col-group col-lg-4 col-sm-12 col-md-2">Tekanan Darah</label>
                </div>
                <div class="row text-xs" style="margin-bottom:-20px;">
                    <div class="form-group col-sm-6 row">
                        <label class="form-label text-sm col-md-4 col-sm-4 col-lg-4">Sistole</label>
                        <div class="col-md-8 col-sm-4 col-lg-8">
                            <div class="input-group">
                                <input @disabled($form) type="text" wire:model.defer="sistole" maxlength="3" class="form-control form-control-sm rounded-0">
                                <div class="input-group-append">
                                    <span class="input-group-text text-xs">
                                        <b> mmHg</b>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 row">
                        <label class="form-label text-sm col-md-4 col-sm-4 col-lg-4">Diastole</label>
                        <div class="col-md-8 col-sm-4 col-lg-8">
                            <div class="input-group">
                                <input @disabled($form) type="text" wire:model.defer="diastole" maxlength="3" class="form-control form-control-sm rounded-0">
                                <div class="input-group-append">
                                    <span class="input-group-text text-xs">
                                        <b> mmHg</b>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom:-5px;">
                    <label class="form-col-group col-lg-4 col-sm-12 col-md-2">IMT</label>
                </div>
                <div class="row text-xs" style="margin-bottom:-5px;">
                    <div class="form-group col-sm-6 row">
                        <label class="form-label text-sm col-md-4 col-sm-4 col-lg-4">Tinggi Badan</label>
                        <div class="col-md-8 col-sm-4 col-lg-8">
                            <div class="input-group">
                                <input @disabled($form) type="text" wire:model.defer="tinggiBadan" maxlength="3" class="form-control form-control-sm rounded-0">
                                <div class="input-group-append">
                                    <span class="input-group-text text-xs">
                                        <b>cm</b>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 row">
                        <label class="form-label text-sm col-md-4 col-sm-4 col-lg-4">Berat Badan</label>
                        <div class="col-md-8 col-sm-4 col-lg-8">
                            <div class="input-group">
                                <input @disabled($form) type="text" wire:model.defer="beratBadan" maxlength="3" class="form-control form-control-sm rounded-0">
                                <div class="input-group-append">
                                    <span class="input-group-text text-xs">
                                        <b>Kg</b>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-xs">
                    <div class="form-group col-sm-6 row">
                        <label class="form-label text-sm col-md-4 col-sm-4 col-lg-4">Lingakar Perut</label>
                        <div class="col-md-8 col-sm-4 col-lg-8">
                            <div class="input-group">
                                <input @disabled($form) type="text"  wire:model.defer="lingkarPerut" maxlength="3" class="form-control form-control-sm rounded-0">
                                <div class="input-group-append">
                                    <span class="input-group-text text-xs">
                                        <b>cm</b>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 row">
                        <label class="form-label text-sm col-md-4 col-sm-4 col-lg-4">Glukosa</label>
                        <div class="col-md-8 col-sm-4 col-lg-7">
                            <div class="input-group">
                                <input @disabled($form) type="text" wire:model.defer="glukosa" maxlength="3" class="form-control form-control-sm rounded-0">
                            </div>
                        </div>
                    </div>
                </div>
                <button @disabled($form) class="float-right btn-primary btn-sm btn "><i class="fa fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
</div>


