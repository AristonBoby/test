<div class="row">
    <div class="col-lg-3 col-sm-12 col-md-12">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$jumlahperhari->count()}}</h3>
                <p>Jumlah Rekam Medis Yang dI Input Hari Ini </p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-12 col-md-12">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-user-plus"></i></span>
            <div class="info-box-content">
                <span class="info-box-text text-xs">Jumlah Rekam Medis </span>
                <span class="info-box-number"><h3>{{$jumlahpasien->count()}}</h3></span>
            <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
            </div>
            </div>
        </div>
    </div>
</div>