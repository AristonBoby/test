<div class="col-md-8">
    <!----Modal/Kunjungan/Cari PAsien---->
    <div wire:ignore.self class="modal fade" id="modalKunjunganCariPasien" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content ">
           <div class="modal-header">
             <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-table"></i> PENCARIAN DATA</b> PASIEN</h6>
             <div wire:loading>
              <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
          </div>
             <button type="button" class="close" data-dismiss="modal" wire:click='hapuscari' aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
               <div class="row">
                   <div class=" col-md-11 col-sm-11 col-lg-11">
                      <form wire:submit.prevent='caridatamodal'>
                        <div class="form-group row">
                            <label class="col-md-2 col-lg-2 col-sm-2 col-from-label text-sm">CARI PASIEN</label>
                            <div class="col-md-10 col-lg-10 col-sm-8 input-group">
                              <input type="text" wire:model.defer='cari' class="form-control form-control-sm" id="recipient-name" placeholder="Pencarian Pasien" required>
                              <span class="input-group-append">
                                <button class="btn btn-primary btn-sm "><i class="fa fa-search"></i> Cari Pasien</button>
                              </span>
                            </div>
                        </div>

                      </form>

                    </div>
                <div class="table-responsive mt-3">
                    <table class="table table-sm table-hover">
                        <thead>
                        <tr>
                            <th class="text-xs" width="10">No</th>
                            <th class="text-xs text-center" width="100">No Rekam Medis</th>
                            <th class="text-xs text-center" width="200">Nama</th>
                            <th class="text-xs text-center" width="70">Tanggal Lahir</th>
                            <th class="text-xs text-center" width="25">Kelamin</th>
                            <th class="text-xs text-center" width="80">NIK</th>
                            <th class="text-xs text-center" width="80">BPJS</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($query)
                                @foreach ($query as $id => $data)
                                    <tr>
                                    <td scope="row" class="text-xs">{{$query->firstItem()+$id}}.</td>
                                    <td scope="row text-center" class="text-xs"><button data-dismiss="modal" wire:click="cariPasien('{{$data->no_Rm}}')" class="btn btn-default btn-xs"><b>{{$data->no_Rm}}</b></button></td>
                                    <td class="text-xs">{{$data->nama}}</td>
                                    <td class="text-xs">{{$data->tanggal_Lahir}}</td>
                                    <td class="text-xs text-center">{{$data->jenkel}}</td>
                                    <td class="text-xs">{{$data->nik}}</td>
                                    <td class="text-xs">{{$data->bpjs}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    @if($query)
                        <div class=" row btn-sm mt-3">
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                {{ $query->links() }}
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <span class="text-sm float-right">
                                    Showing {{$query->currentPage()}} - {{$query->lastPage()}} of {{$query->total()}}
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-danger btn-sm text-sm" wire:click='hapuscari' data-dismiss="modal"><i class="text-xs fa fa-times"></i> Tutup</button>
           </div>
         </div>
       </div>
     </div>
     <!---END Modal/Kunjungan/Cari PAsien---->
</div>
