<div class="card card-danger card-outline">
    <div class="card-header">
        <h5 class="card-title">Tanggal Laporan</h5>
    </div>
    <div class="card-body">
        <form wire:submit.prevent='store' class="text-sm">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-4 form-col-label">Mulai Tanggal</label>
                    <div class="col-md-7">
                        <input type="date" wire:model="tanggalMulai" class="form-control form-control-sm rounded-0">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-4 form-col-label">Sampai Tanggal</label>
                    <div class="col-md-7">
                        <input type="date" wire:model="tanggalSampai" class="form-control form-control-sm rounded-0">
                    </div>
                </div>
            </div>
    </div>
    <div class="card-footer">
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-md-3 btn-group">
                        <a class="btn btn-info float-left btn-sm text-xs" target="_blank" href="cetakKunjungan/{{$tanggalMulai}}/{{$tanggalSampai}}"><i class="fa fa-print text-xs"></i> Print PDF</a>
                    </div>
                    <div class="col-md-9">
                        <Button class="btn btn-primary float-right btn-sm text-sm"><i class="fas fa-search text-xs"></i> Cari</Button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
