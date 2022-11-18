<?php
        $connection = mysqli_connect('localhost', 'root', '', 'waluty');
        $result = mysqli_query($connection, "SELECT DISTINCT * FROM history");
        if($result){
            echo "Połączono";
        }
    ?>
<html>
  <head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Sales', 'Expenses'],
          <?php
            while($row = mysqli_fetch_array($result)){
                    echo "['".$row['date']."', '".$row['EURbuy']."', '".$row['EURsell']."'],";
                        }
            ?>          
        ]);

        var options = {
          title: 'Company Performance',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>