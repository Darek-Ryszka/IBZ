<?php
        $connection = mysqli_connect('localhost', 'root', '', 'waluty');
        $result = mysqli_query($connection, "SELECT * FROM history GROUP BY date");
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
            ['Day', 'Buy', 'Sell'],
          <?php
         
            while($row = mysqli_fetch_array($result)){
                    echo "['".$row['date']."',".$row['EURbuy'].", ".$row['EURsell']."],";
                        }                     
            ?>          
        ]);

        var options = {
          title: 'Kurs Euro',
          legend: { position: 'top' },
          hAxis: {
          title: 'Data'
        },
        vAxis: {
          title: 'PLN'
        },

        };

        var chart = new google.visualization.LineChart(document.getElementById('Euro'));

        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <div id="Euro" style="width: 1920px; height: 800px"></div>
  </body>
</html>