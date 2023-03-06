<div class="col-md-8">
    <!----Modal/Kunjungan/Cari PAsien---->
    <div wire:ignore.self class="modal fade" id="modalHapus" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog modal-md" role="document">
         <div class="modal-content ">
           <div class="modal-header">
             <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-trash-alt"></i> &nbsp; HAPUS DATA</b> KUNJUNGAN</h6>
                <div wire:loading>
                    <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="text-md">Apakah Anda Ingin Menghapus Data Kunjungan Pasien ?</span>
                <div class="mt-5">
                    <button type="button" class=" float-right btn btn-danger ml-2 btn-flat btn-sm text-sm" wire:click='hapusRiwayat'><i class="text-xs fa fa-trash-alt"></i> Hapus</button>
                    <button type="button" class=" float-right btn btn-default btn-flat btn-sm text-sm"  data-dismiss="modal"><i class="text-xs fa fa-times"></i> Batal</button>
                </div>
            </div>
       </div>
     </div>
     <!---END Modal/Kunjungan/Cari PAsien---->
</div>
</div>
