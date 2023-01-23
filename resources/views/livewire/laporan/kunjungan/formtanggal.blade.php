<div class="card card-danger card-outline">
    <div class="card-header">
        <h5 class="card-title"><b>Laporan</b> Kunjungan</h5>
        <div wire:loading>
            <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-sm fas fa-stroopwafel fa-spin"></i> &nbsp; Loading...</span>
        </div>
    </div>
    <div class="card-body">
        <form wire:submit.prevent='store' class="text-sm">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-12 col-sm-12 col-lg-4 form-col-label">Mulai Tanggal</label>
                    <div class="col-md-12 col-sm-12 col-lg-8">
                        <input type="date" wire:model.defer="tanggalMulai" class="form-control form-control-sm rounded-0" required>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-12 col-sm-12 col-lg-4 form-col-label">Sampai Tanggal</label>
                    <div class="col-md-12 col-sm-12 col-lg-8">
                        <input type="date" wire:model.defer="tanggalSampai" class="form-control form-control-sm rounded-0" required>
                    </div>
                </div>
            </div>
</div>
    <div class="card-footer">
            <div class="form-group row">
                <div class="col-md-6 col-sm-12 col-lg-4">
                        <a target="_blank" class=" btn btn-danger float-left btn-sm text-sm float-left" href="cetakKunjungan/{{$tanggalMulai}}/{{$tanggalSampai}}"><i class="fas fa-file-pdf" aria-hidden="true"></i>  PDF</a>
                </div>
                <div class="col-md-6 col-lg-8 col-sm-12">
                        <Button class=" btn float-right btn-primary  btn-sm text-sm"><i class="fas fa-search text-xs"></i> Cari</Button>
                </div>
            </div>
        </form>
    </div>
</div>
