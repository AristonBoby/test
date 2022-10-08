<div>
    <div class=" card card-primary card-outline col-md-12 col-lg-4 ">
        <div class="card-header">
            <h5 class="card-title">Form Laporan Poli</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent='render()'>
            <div class="form-group row">
                <label class="form-label text-sm col-lg-4">Mulai Tanggal</label>
                <div class="col-md-6">
                    <input type="date" class="form-control form-control-sm rounded-0" wire:model="mulaitanggal">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-label text-sm col-lg-4">Sampai Tanggal</label>
                <div class="col-md-6">
                    <input type="date" class="form-control form-control-sm rounded-0" wire:model="sampaitanggal">
                </div>
            </div>
            <button id="refresh" class="btn btn-sm btn-primary float-right">Cari</button>
            </form>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-lg-12 card card-primary card-outline">
        <div class="card-header">
            <h5 class="card-title">Laporan Poli</h5>
        </div>
        <div class="card-body">
            <table class="table-sm table text-center table-bordered">
                <thead>
                    <tr>
                        <td width=5%>No</td>
                        <td width="60%">Poli</td>
                        <td width="7%">Jumlah</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporanpoli as $no=>$poli)
                    <tr>
                        <td>{{$laporanpoli->firstItem()+$no}}.</td>
                        <td>{{$poli->nama_poli}}</td>
                        <td>{{$poli->jumlah}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="chart" class="col-sm-12 col-md-12 col-lg-12 card card-primary card-outline">
        <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Bar Chart</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/boottrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>
<script>
    $(function () {
      setInterval(() => Livewire.emit('ubahData'),3000);
        var areaChartData = {labels  : [
                                          @foreach ($laporanpoli as $poli)
                                            '{{$poli->nama_poli}}',
                                          @endforeach
                                        ],
                              datasets: [
                                          {
                                            label               : ['LAPORAN POLI'],
                                            backgroundColor     : 'rgba(60,120,188,0.9)',
                                            borderColor         : 'rgba(120,141,188,0.8)',
                                            pointRadius         : false,
                                            pointColor          : '#3b8bba',
                                            pointStrokeColor    : 'rgba(60,141,188,1)',
                                            pointHighlightFill  : '#fff',
                                            pointHighlightStroke: 'rgba(120,141,188,1)',
                                            data                : [
                                                                    @foreach ($laporanpoli as $no=>$poli)
                                                                        '{{$poli->jumlah}}',
                                                                    @endforeach
                                                                  ]
                                          },
                                        ]
                              }
        console.log(areaChartData);
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    barChartData.datasets[0] = temp0  
    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : true
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    
  })
 
  </script>
