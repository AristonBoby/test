<div class="col-md-8">
    <!----Modal/Kunjungan/Cari PAsien---->
    <div wire:ignore.self class="modal fade" id="modalKunjunganCariPasien" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content ">
           <div class="modal-header">
             <h6 class="modal-title" id="staticBackdropLabel"><b>PENCARIAN DATA</b> PASIEN</h6>
             <div wire:loading>
              <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
          </div>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
               <div class="row">
                   <div class=" col-md-11 col-sm-11 col-lg-11">
                      <form wire:submit.prevent='cariData'>
                        <div class="form-group row">
                            <label class="col-md-2 col-lg-2 col-sm-2 col-from-label text-sm">CARI PASIEN</label>
                            <div class="col-md-10 col-lg-10 col-sm-8 input-group">
                              <input type="text" wire:model.defer='cari' class="form-control" id="recipient-name" placeholder="Pencarian Pasien" required>
                              <span class="input-group-append">
                                <button class="btn btn-primary ">Cari</button>
                              </span>
                            </div>
                        </div>
                      </form>
                       <p class="text-xs text-danger text-center">*Pencarian Pasien berdasarkan Nama, NIK, BPJS</p>
                    </div>
                <div class="table-responsive">
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
                          <td scope="row" class="text-xs">{{$id+1}}.</td>
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
