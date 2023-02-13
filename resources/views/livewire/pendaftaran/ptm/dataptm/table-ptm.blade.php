<div class="card card-primary card-outline">
   <div class="card-header"> 
        <h5 class="card-tile">Data PTM</h5>
   </div>
   <div class="card-body">
        <div class="col-sm-12 col-lg-12 col-md-12 mb-4">
            <h5 class="text-center">Kategori Pencarian</h5>
        </div>
        <div class="row form-horizontal">
            <div class="col-md-3">
                <div class="form-group row">
                    <label class="col-md-4 form-label text-sm">Diabetes Militus</label>
                    <div class="col-md-3">
                        <select class="form-control form-control-sm rounded-0" wire:model.lazy='data.dm'>
                            <option value="">Tidak Ada</option>
                            <option value="1" >Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label class="col-md-3 form-label text-sm" >Hypertensi</label>
                    <div class="col-md-3">
                        <select class="form-control form-control-sm rounded-0" wire:model.lazy='data.ht'>
                            <option value="">Tidak Ada</option>
                            <option value="1" >Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="form-group row float-right">
                    <label class="col-md-4 form-label text-sm">Pencarian</label>
                    <div class="col-md-8 input-group">
                        <input class="form-control form-control-sm rounded-0" wire:model.lazy='caridata' placeholder="Pencarian data ...">
                        <span class="input-group-append">
                            <button class="btn btn-primary btn-sm" wire:click='render'>Cari</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Umur</th>
                        <th>Kelamin</th>
                        <th>No/ Telepon / HP</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>*</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr wire:loading>
                        <td>Loading ...</td>
                    </tr>
                    @foreach ($pasien as $no=>$data)
                    <tr wire:loading.remove>
                        <td>{{$pasien->firstItem()+$no}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{\Carbon\Carbon::parse($data->tanggal_Lahir)->format('d-m-Y')}}</td>
                        <td>{{\Carbon\Carbon::parse($data->tanggal_Lahir)->age}}</td>
                        <td>{{$data->jenkel}}</td>
                        <td>{{$data->no_tlpn}}</td>
                        <td>{{$data->nik}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->ht}}{{$data->dm}}</td>
                        <td>{{$data->skrining}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   </div>
</div>
