<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$jumlahperhari->count()}}</h3>
                <p>Data Pasien Baru Yang di Daftar Hari Ini</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-user-plus"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Pasien Yang Telah Terdaftar</span>
                <span class="info-box-number"><h3>{{$jumlahpasien->count()}}</h3></span>
            <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>44</h3>
                <p>Data Pasien Yang di daftar</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-pie"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="far fa-thumbs-up"></i>
            </div>
    </div>
</div>