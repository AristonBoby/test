<div class='card'>
    <div class="card-body">
        <form wire:submit.prevent='cari' class="form-horizontal text-sm">
            <div class="form-group row">
                <label class="form-label col-md-4">Dari</label>
                <div class="col-md-8">
                    <input type="date" wire:model.defer='tglmulai' class="form-control rounded-0 form-control-sm">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-label col-md-4">Sampai</label>
                <div class="col-md-8">
                    <input wire:model.defer='tglsampai' class="form-control rounded-0 form-control-sm" type="date">
                </div>
            </div>
            <button class="btn btn-primary btn-sm  float-right btn-flat`"><i class="fas fa-print"></i> Cari</button>
        </form>
    </div>
</div>
