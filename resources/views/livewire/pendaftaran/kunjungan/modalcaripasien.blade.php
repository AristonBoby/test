<div class="col-md-8">
    <!----Modal/Kunjungan/Cari PAsien---->
    <div wire:ignore.self class="modal fade" id="modalKunjunganCariPasien" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content ">
           <div class="modal-header">
             <h6 class="modal-title" id="staticBackdropLabel"><b>PENCARIAN DATA</b> PASIEN</h6>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
               <div class="row justify-content-md-center">
                   <div class=" col-md-6">

                       <div class="form-group row">
                             <label class="col-md-3 col-from-label text-xs">CARI PASIEN</label>
                             <div class="col-md-9 row">
                                   <input type="text" wire:model='cari' class="form-control form-control-sm rounded-0 text-sm col-md-9" id="recipient-name" placeholder="Pencarian Pasien">

                                   <p class="text-xs text-danger">*Pencarian Pasien berdasarkan Nama, NIK, BPJS</p>
                           </div>

                   </div>
               </div>
               <table class="table table-responsive table-sm table-striped table-bordered table-hover">
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

                   @foreach ($query as $id => $data)
                   <tr>
                     <td scope="row" class="text-xs">{{$id+1}}.</td>
                     <td scope="row text-center" class="text-xs">{{$data->no_Rm}}</td>
                     <td class="text-xs">{{$data->nama}}</td>
                     <td class="text-xs">{{$data->tanggal_Lahir}}</td>
                     <td class="text-xs text-center">{{$data->jenkel}}</td>
                     <td class="text-xs">{{$data->nik}}</td>
                     <td class="text-xs">{{$data->bpjs}}</td>
                   </tr>
                   @endforeach

                 </tbody>
               </table>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-danger btn-sm text-sm" wire:click='hapuscari' data-dismiss="modal"><i class="text-xs fa fa-times"></i> Tutup</button>
           </div>
         </div>
       </div>
     </div>
     <!---END Modal/Kunjungan/Cari PAsien---->
</div>
