<div wire:ignore.self class="modal fade" id="hapusMyModal" role="dialog" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-md" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="edit"><b>HAPUS</b> SKRINING RIWAYAT PENYAKIT</h6>
            <div wire:loading>
              <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
            <a type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body" wire:loading.remove>
            <span>Apakah anda ingin menghapus data Skrining ?</span>
        </div>
        <div class="modal-footer" wire:loading.remove>
            <button class="btn btn-default btn-flat btn-sm">Batal</button>
            <button class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash-alt fa-light"></i> Hapus</button>
        </div>
      </div>
    </div>
</div>
