    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Chart Laporan Pendaftaran Pasien</h5>
        </div>
        <div class="card-body">
          <canvas id="myChart"></canvas>
        </div>
      </div>
    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      var chartData = JSON.parse('<?php echo $pasien ?>');
      console.log(chartData);
      const ctx = document.getElementById('myChart');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: chartData.label,
          datasets: [{
            label: 'Input Data Pasien',
            data: chartData.data,
          }]
        },
      });
    </script>
     @endpush