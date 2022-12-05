<div class="card col-md-12 col-md-12 col-sm-12">
  <div class="card-header">
      <h5 class="card-title">Diagram Laporan Pendaftaran Pasien</h5>
  </div>
  <div class="card-body">
    
    <canvas id="myChart"></canvas>
    
    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const ctx = document.getElementById('myChart');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange','ddd'],
          datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3,3],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
     @endpush
  </div>
</div>