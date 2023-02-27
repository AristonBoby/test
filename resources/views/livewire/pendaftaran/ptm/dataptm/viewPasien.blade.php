<div wire:ignore.self class="modal fade" id="viewPasien" role="dialog" class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit"><b>EDIT</b> SKRINING RIWAYAT PENYAKIT</h5>
            <div wire:loading>
              <span class="badge bg-success text-xs"style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
            <a type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body" wire:loading.remove>
            <form wire:submit.prevent='updateRiwayat' class="form-horizontal">

            </form>
        </div>
      </div>
    </div>
</div>
