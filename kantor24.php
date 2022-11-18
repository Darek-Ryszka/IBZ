<?php
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=waluty", "root", "");
            echo "Sukces! Połączenie z bazą danych powiodło się. </br>";
        } catch(PDOException $e){
            echo "Błąd! Połączenie z bazą danych nie powiodło się. </br>";
        }
        // $connection = mysqli_connect('localhost', 'root', '', 'waluty');
        // $result = mysqli_query($connection, "SELECT DISTINCT * FROM history");
        // if($result){
        //     echo "Połączono";
        // }
    ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantor24</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['id', 'EURbuy', 'EURsell'],
          <?php 
                // $sql = "SELECT * FROM history"; 

                // $result = $pdo->query($sql);

                // if($result->rowCount() > 0){                       
                //         while($row = $result->fetch()){
                //             echo "['".$row['id']."', '".$row['EURbuy']."', '".$row['EURsell']."']";
                //         }      
                // } else{
                //     echo "Brak rekordów w bazie danych do wyświetlenia.";
                // }        
                // if(mysqli_num_rows($result)>0){

                //     while($row = mysqli_fetch_array($result)){
                //         echo "['".$row['id']."', '".$row['EURbuy']."', '".$row['EURsell']."'],";
                //     }
                // }       
          ?>
        ]);

        var options = {
          title: 'EURO - kupno',
        //   curveType: 'function',
        //   legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>

    <h1>Witam na stronie Kantor24</h1>

    <div id="curve_chart" style="width: 900px; height: 500px"></div>

</body>
</html>