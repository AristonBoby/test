<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card card-purple card-outline">
        <div class="card-header">
            <h3 class="card-title"><b>Input Data</b> PTM</h3>
            <div wire:loading>
                <span class="badge bg-success text-sm"style="margin-left:5px;"> <i class="text-sm fas fa fa-spinner fa-spin"></i> &nbsp; Loading...</span>
            </div>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form wire:submit.prevent='inputPtm'>
                <div class="form-group row">
                    <label class="form-col-group col-lg-2 col-sm-12 col-md-2">Tanggal</label>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="input-group">
                            <input type="text" wire:model.defer="varTanggal" onchange='Livewire.emit("ubahTanggal", this.value)' class="date form-control form-control-sm rounded-0" readonly placeholder="dd-mm-yyyy">
                            <div class="input-group-append">
                                <span class="input-group-text fa-light">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="form-col-group col-lg-2 col-sm-12 col-md-2">No.</label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <input type="text"  wire:model.defer="nik" maxlength="16" class="form-control form-control-sm rounded-0"  placeholder="Masukan NIK ">
                            <span class="input-group-append">
                                <button class="btn btn-primary btn-sm">Cari</button>
                                <button type="button" class="btn btn-default btn-sm"><b>...</b></button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <script>
    window.addEventListener('datatidakditemukan', event => {
        Swal.fire({
            title: 'Perhatian',
            text: "Data Kunjungan Pasien tidak ditemukan Pada tanggal tersebut",
        })
    });

    window.addEventListener('alert', event => {
        Swal.fire({
            title: event.detail.title,
            text : event.detail.text,
            icon : event.detail.icon,
        })
    });

    </script>
