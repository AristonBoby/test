<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-12 col-md-12">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{$jumlahperhari->count()}}</h3>
                        <p>Jumlah Rekam Medis Yang dI Input Hari Ini <br>
                            Oleh {{Auth::user()->name}}
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$jumlahperUser->count()}}</h3>
                        <p>Jumlah Seluruh Pasien Yang Telah di Daftar<br>Oleh
                        {{Auth::user()->name}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$jumlahperbulan->count()}}</h3>
                            <p>Jumlah Pasien Yang di Daftar Bulan Ini
                                                            </p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        </div>
                    </div>
            <div class="col-lg-4 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$jumlahpasien->count()}}</h3>
                        <p>Jumlah Seluruh Pasien Yang Terdaftar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    </div>
                </div>
        </div>
    </div>
</div>