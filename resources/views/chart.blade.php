<script src="//www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable({!! $chartData['data'] !!});

        var options = {
            curveType: 'function',
            legend: {position: 'none'},
            tooltip: {isHtml: true},
            chartArea: {width: '100%', height: '80%'},
            vAxis: {
                gridlines: {
                    color: 'transparent'
                }
            },
            hAxis: {
                gridlines: {
                    color: 'transparent'
                }
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
</script>
<div id="curve_chart" style="width: 100%; height: 200px"></div>