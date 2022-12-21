<div class="card card-danger card-outline">
    <div class="card-header">
        <h5 class="card-title"><b>Laporan</b> Kunjungan</h5>
        <div wire:loading>
            <span class="badge bg-success text-sm" style="margin-left:5px;"> <i class="text-sm fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
        </div>
    </div>
    <div class="card-body">
        <form wire:submit.prevent='store' class="text-sm">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-4 form-col-label">Mulai Tanggal</label>
                    <div class="col-md-7">
                        <input type="date" wire:model.defer="tanggalMulai" class="form-control form-control-sm rounded-0">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-4 form-col-label">Sampai Tanggal</label>
                    <div class="col-md-7">
                        <input type="date" wire:model.defer="tanggalSampai" class="form-control form-control-sm rounded-0">
                    </div>
                </div>
            </div>
</div>
    <div class="card-footer">
            <div class="col-md-12 col-lg-12 col-sm-12 form-group row">
                <div class="col-md-12 col-sm-12 col-lg-3">
                        <a class="col-md-12 col-sm-12 col-lg-12 btn btn-danger float-left btn-sm text-sm float-left" href="cetakKunjungan/{{$tanggalMulai}}/{{$tanggalSampai}}"><i class="fa fa-print text-xs"></i>  PDF</a>
                </div>
                <div class="col-md-12 col-lg-9 col-sm-12">
                        <Button class="col-md-12 col-lg-4 col-sm-12 btn float-right btn-primary  btn-sm text-sm"><i class="fas fa-search text-xs"></i> Cari</Button>
                </div>
            </div>
        </form>
    </div>
</div>
