<div>
    <div class="card card-primary card-outline">
    <div class="card-header">
            <h5 class="card-tile">Data PTM</h5>
    </div>
    <div class="card-body">
            <div class="col-md-12 ">
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
            <div class="card-primary ">
                <form wire:submit.prevent='cari'>
                    <input class="form-control">
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-stripped table-bordered table-sm text-center">
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
                            <th class="text-center">*</th>
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
                            <td>@if($data->ht == 1)
                                    <span class="badge badge-warning right">Hipertensi</span>
                                @endif
                                <br>
                                @if($data->dm == 1)
                                    <span class="badge badge-danger right">Diabetes Melitus</span>
                                @endif</td>
                            <td>@if($data->skrining == 0)
                                    <button data-toggle="modal"  wire:click="idPasien('{{$data->id}}')" data-target="#myModal"  class="btn btn-primary btn-xs">Skrining</button>
                                @elseif($data->skrining == 1)
                                    <button class="btn btn-success btn-xs">Sudah Skrining</button>
                                @endif</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    @include('livewire.pendaftaran.ptm.dataptm.modalRiwayat')
</div>
