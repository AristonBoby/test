<div class="col-md-8">
    <!----Modal/Kunjungan/Cari PAsien---->
    <div wire:ignore.self class="modal fade" id="modalLaporanPoli" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content ">
           <div class="modal-header">
             <h6 class="modal-title" id="staticBackdropLabel"><b><i class="fa fa-table"></i> LAPORAN JUMLAH</b> POLI</h6>
             <div wire:loading>
              <span class="badge bg-success text-xs" style="margin-left:5px;"> <i class="text-xs fas fa-3x fa-sync-alt fa-spin"></i> Loading...</span>
            </div>
             <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
            <div class="col-lg-12">
                <div class="input-group mb-4 col-lg-4 float-right">
                    <input type="text" class="form-control" wire:model="cari" placeholder="Pencarian...">
                    <span class="input-group-append">
                        <button class="btn btn-primary btn-sm" wire:click='render'><i class="fa fa-search"></i> Cari</button>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-xs table-bordered table-striped table-hover text-uppercase text-sm" wire:loading.remove>
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>No Rekam Medis</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th> jenkel</th>
                            <th> nik</th>
                            <th> Alamat</th>
                            <th>Jaminan</th>
                            <th>Poli</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$query->count()==0)
                            @foreach ($query as $no=>$item)
                                <tr>
                                    <td>{{ $query->firstItem()+$no }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                    <td>{{ $item->no_Rm  }}</td>
                                    <td>{{ $item->nama}}</td>
                                    <td>{{ $item->tempat_Lahir}}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_Lahir)->format('d-m-Y')}}</td>
                                    <td>{{ $item->jenkel}}</td>
                                    <td>{{ $item->nik}}</td>
                                    <td>{{ $item->alamat}}</td>
                                    <td>{{ $item->jaminan}}</td>
                                    <td>{{ $item->nama_poli}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12">
                {{ $query->links() }}
            </div>
         </div>
       </div>
     </div>
     <!---END Modal/Kunjungan/Cari PAsien---->
</div>
</div>
