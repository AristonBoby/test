<div class="col-lg-8">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Tabel Poli</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form class="form-horizontal">
                    <div class="row mb-3 float-right">
                       <button class="btn btn-primary btn-flat btn-sm" wire:click.prevent="render">Refresh</button>
                    </div>
                </form>
            </div>
            <div>
                <table class="table table-sm text-center table-hover text-sm table-bordered">
                    <thead>
                       
                        <tr>
                            <th>No</th>
                            <th>Kode Poli</th>
                            <th>Nama Poli</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody wire:loading.remove='table'>
                        @if($query->isEmpty())
                        <tr>
                            <td colspan=4>Data Kosong</td>
                        </tr>
                        @endif
                        @foreach ($query as $index => $data )
                        <tr>
                            <td>{{$query->firstItem() + $index}}</td>
                            <td>{{$data->id_poli}}</td>
                            <td>{{$data->nama_poli}}</td>
                            @if($data->status==1)
                                <td><span class="badge bg-success">Aktif</span></td>
                            @elseif($data->status==0)
                                <td><span class="badge bg-danger">Tidak Aktif</span></td>
                            @endif
                            <td><a class="btn btn-xs btn-danger btn-flat"  href="javascript:void(0)" wire:click='konfirmasiHapusPoli({{$data->id_poli}})'><i class="fas fa-light fa-trash-alt"></i></td>
                        </tr>
                        @endforeach
                    </tbody>                      
                </table>
                <div wire:loading wire:loading.target='table'>
                    <p class="text-center">Loading...</p>
                </div>
                {{$query->links()}}
            </div>
        </div>
    </div>
</div>
<script>
     window.addEventListener('hapus', event => {
              Swal.fire({
              title: 'Apakah Anda ingin Menghapus Poli?',
              text: "Hapus Data",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'YA'
            }).then((result) => {
              if (result.isConfirmed) {
                  Livewire.emit('hapusPoli')
              }
            })
      });

      
      window.addEventListener('berhasilHapus', event => {
        Swal.fire({
            title: 'Berhasil',
            text: "Data Berhasil di Hapus",
            icon: 'success',
        })
    });
</script>