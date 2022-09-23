<div class="content">
    <div class="container-fluid">
        <div class="card card-warning">
            <div class="card-header">
                <h5 class="card-title">Laporan Data Inputan Pendaftaran Pasien Baru <b>{{Auth::user()->name}}</b></h5>
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-lg-4 col-sm-12 col-md-12">
                
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{$jumlahperhari->count()}}</h3>
                            <p>Jumlah Rekam Medis Yang dI Input Hari Ini <br>
                                {{Auth::user()->name}}
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
                            <h3>{{$jumlahperbulan->count()}}</h3>
                            <p>Jumlah Pasien Yang di Input Bulan Ini <br>
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
                                <h3>{{$jumlahperUser->count()}}</h3>
                                <p>Jumlah Pasien Yang di Input
                                <br>{{Auth::user()->name}}</p>
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
                            <p>Jumlah Pasien Yang Terdaftar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-book"></i>
                        </div>
                        </div>
                    </div>
            </div>
    </div>
</div>