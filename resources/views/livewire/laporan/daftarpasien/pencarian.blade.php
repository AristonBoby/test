<div class='card card-primary card-outline'>
    <div class="card-header">
        <h5 class="card-title"><b>Pencarian</b> Laporan</h5>
        <div wire:loading>
            <span class="badge bg-success text-sm" style="margin-left:5px;"> <i class="text-sm fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
        </div>
    </div>
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
            <button class="btn btn-primary btn-sm  float-right btn-flat`"><i class="fas fa-search"></i> Cari</button>
        </form>
    </div>
</div>
