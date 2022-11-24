<?php
        $connection = mysqli_connect('localhost', 'root', '', 'waluty');
        $result = mysqli_query($connection, "SELECT * FROM history GROUP BY date");
        $result2 = mysqli_query($connection, "SELECT * FROM history GROUP BY date");
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
      google.charts.setOnLoadCallback(drawChart2);


      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Day', 'Buy', 'Sell'],
          <?php
         
            while($row = mysqli_fetch_array($result)){
                    echo "['".$row['date']."', ".$row['EURbuy'].", ".$row['EURsell']."],";
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

      function drawChart2() {
        var data2 = google.visualization.arrayToDataTable([
            ['Day', 'Buy', 'Sell'],
          <?php
         
            while($row2 = mysqli_fetch_array($result2)){
                    echo "['".$row2['date']."', ".$row2['USDbuy'].", ".$row2['USDsell']."],";
                        }                     
            ?>          
        ]);

        var options2 = {
          title: 'Kurs Dolara',
          legend: { position: 'top' },
          hAxis: {
          title: 'Data'
        },
        vAxis: {
          title: 'PLN'
        },

        };

        var chart2 = new google.visualization.LineChart(document.getElementById('Dolar'));

        chart2.draw(data2, options2);
      }
    </script>
  </head>

  <body>
    <!-- Stylizacja czcionki i tablicy w CSS-->
    <style>
        *{
            font-family: sans-serif; 
         }
    </style>

    <div id="Euro" style="width: 1920px; height: 800px"></div>

    <div id="Dolar" style="width: 1920px; height: 800px"></div>
  </body>
</html>