    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Chart Laporan Pendaftaran Pasien</h5>
        </div>
        <div class="card-body">
          <canvas class="col-lg-12 col-md-12 col-sm-12" id="myChart"  height="200"></canvas>
        </div>
      </div>
    @push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script> 
     /* var chartData = JSON.parse('<?php echo $pasien ?>');
      console.log(chartData);
      const ctx = document.getElementById('myChart');
      const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: chartData.label,
          datasets: [{
            label: 'Input Data Pasien',
            data: chartData.data,
          }]
        },
      });*/
      window.addEventListener('berhasilUpdate', event => {
        alert('event');
      });
    </script>
     @endpush