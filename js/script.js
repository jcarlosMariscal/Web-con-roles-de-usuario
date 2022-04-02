// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Work', 8],
  ['Friends', 2],
  ['Eat', 2],
  ['TV', 2],
  ['Gym', 2],
  ['Sleep', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Average Day', 'width':500, 'height':200};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
  chart.draw(data, options);
  chart2.draw(data, options);

  var data2 = google.visualization.arrayToDataTable([
    ['Year', 'Sales', 'Expenses'],
    ['2004',  1000,      400],
    ['2005',  1170,      460],
    ['2006',  660,       1120],
    ['2007',  1030,      540]
  ]);
  var options2 = {
    title: 'Company Performance',
    curveType: 'function',
    legend: { position: 'bottom' }
  };
  var chart3 = new google.visualization.LineChart(document.getElementById('curve_chart'));

  chart3.draw(data2, options2);
}
