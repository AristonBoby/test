<div class="col-md-8">
    <!----Modal/Kunjungan/Cari PAsien---->
    <div wire:ignore.self class="modal fade" id="modalKunjunganCariPasien" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content ">
           <div class="modal-header">
             <h6 class="modal-title" id="staticBackdropLabel">PENCARIAN DATA PASIEN</h6>
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
               <table class="table">
                 <thead>
                   <tr>
                     <th class="text-xs">No</th>
                     <th class="text-xs">Nomor Rekam Medis</th>
                     <th class="text-xs">NAMA</th>
                     <th class="text-xs">TANGGAL LAHIR</th>
                     <th class="text-xs">NIK</th>
                     <th class="text-xs">BPJS</th>
                   </tr>
                 </thead>
                 <tbody>
                  
                   @foreach ($query as $id => $data)
                   <tr>
                     <td scope="row" class="text-xs">{{$id+1}}</td>
                     <td scope="row" class="text-xs">{{$data->no_Rm}}</td>
                     <td class="text-xs">{{$data->nama}}</td>
                     <td class="text-xs">{{$data->tanggal_Lahir}}</td>
                     <td class="text-xs">{{$data->nik}}</td>
                     <td class="text-xs">{{$data->bpjs}}</td>
                   </tr> 
                   @endforeach
                  
                 </tbody>
               </table>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-danger btn-sm" wire:click='hapuscari' data-dismiss="modal">Tutup</button>
           </div>
         </div>
       </div>
     </div>
     <!---END Modal/Kunjungan/Cari PAsien---->
</div>