<div class="card card-danger card-outline">
    <div class="card-header">
        <h5 class="card-title"><b>Laporan</b> Kunjungan</h5>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
            </button>

            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
            </button>
        </div>
        <div wire:loading>
            <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-sm fas fa-stroopwafel fa-spin"></i> &nbsp; Loading...</span>
        </div>
    </div>
    <div class="card-body">
        <form wire:submit.prevent='store' class="text-sm">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-12 col-sm-12 col-lg-5 form-col-label">Mulai Tanggal <code>*</code></label>
                    <div class="col-md-12 col-sm-12 col-lg-7">
                        <div class="input-group">
                            <input type="text" value="{{$tanggalMulai}}" onchange="Livewire.emit('tanggalLaporanMulai',this.value)" class="tglLaporan form-control form-control-sm rounded-0" readonly placeholder="dd-mm-yyyy">
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-12 col-sm-12 col-lg-5 form-col-label">Sampai Tanggal <code>*</code></label>
                    <div class="col-md-12 col-sm-12 col-lg-7">
                        <div class="input-group">
                            <input type="text" value="{{$tanggalSampai}}" onchange="Livewire.emit('tanggalLaporanSampai',this.value)" class="tglLaporan form-control form-control-sm rounded-0" readonly placeholder="dd-mm-yyyy">
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
</div>
    <div class="card-footer">
            <div class="form-group row mt-3">
                <div class="col-md-4 col-sm-4 col-lg-4 mb-2">
                        <a target="_blank" class=" btn btn-danger float-left btn-sm btn-block text-sm float-left" href="cetakKunjungan/{{$tanggalMulai}}/{{$tanggalSampai}}"><i class="fas fa-file-pdf" aria-hidden="true"></i>  PDF</a>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 mb-2">
                    <a target="_blank" class=" btn btn-success btn-sm btn-block text-sm float-left" href="cetakKunjungan/{{$tanggalMulai}}/{{$tanggalSampai}}"><i class="fas fa-file-excel" aria-hidden="true"></i>  Excel</a>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4">
                        <Button class=" btn float-right btn-primary btn-block btn-sm text-sm"><i class="fas fa-search text-xs"></i> Cari</Button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function () {
        $('.tglLaporan').datepicker({
            format: "dd-mm-yyyy",
            autoclose:true,
            endDate: "dateToday",

        });
    });
</script>
