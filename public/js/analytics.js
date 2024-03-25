// Assuming you have an endpoint in Laravel like '/fetch-chart-data'
$.ajax({
  url: '/fetch-chart-data',
  method: 'GET',
  dataType: 'json',
  success: function(response) {
      // Assuming the response is in the format { labels: [...], data: [...] }
      var chartData = {
          labels: response.labels,
          series: [response.data]
      };

      new Chartist.Line('#views-graphic', chartData, {
          low: 0,
          showArea: true,
          fullWidth: true,
          distributeSeries: true,
          plugins: [
              Chartist.plugins.tooltip()
          ]
      });
  },
  error: function(error) {
      console.error('Error fetching chart data:', error);
  }
});
