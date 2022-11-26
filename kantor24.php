<!-- Połączenie z bazą danych i ich sortowanie/grupowanie -->
<?php
    $connection = mysqli_connect('localhost', 'root', '', 'waluty');

    if (mysqli_connect_errno()) {
      printf("Połączenie z bazą danych nieudane: %s\n", mysqli_connect_error());
      exit();
  }

    $result = mysqli_query($connection, "SELECT * FROM history GROUP BY date ORDER BY date_time LIMIT 100");
    $result2 = mysqli_query($connection, "SELECT * FROM history GROUP BY date ORDER BY date_time LIMIT 100");
?>

<!DOCTYPE html>    
<html lang="pl">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Dariusz Ryszka">
    <title>Projekt</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&family=Montserrat:wght@400;700&display=swap"
        rel="stylesheet">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart2);


        function drawChart() {
          var data = google.visualization.arrayToDataTable([
              ['Day', 'Kupno', 'Sprzedaż'],
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
              ['Day', 'Kupno', 'Sprzedaż'],
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
    <!----start header---->
    <header>
          <a href="#" class="logo">Projekt</a>
          <div class="bx bx-menu" id="menu-icon"></div>

          <ul class="navbar">
              <li><a href="#home">Home</a></li>
              <li><a href="#about">Kursy walut</a></li>
              <li><a href="#contact">Kontakt</a></li>
          </ul>
          <a href="#" class="h-btn">Home</a>
      </header>

    <!----start home---->
    <section class="home" id="home">
        <div class="home-text">
            <h4>Witamy na stronie</h4>
            <h1>Kantor <span>Money24</span></h1>
            <h3>Oferujemy wymianę walut po <span>najlepszych cenach</span></h3>
            <h3>O nas</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Luctus accumsan tortor posuere ac ut consequat semper viverra. Ut tellus elementum sagittis vitae et leo. Ullamcorper dignissim cras tincidunt lobortis feugiat. Magna etiam tempor orci eu lobortis elementum nibh tellus. Malesuada proin libero nunc consequat interdum varius sit amet mattis. Volutpat maecenas volutpat blandit aliquam etiam. Lacinia quis vel eros donec. Gravida dictum fusce ut placerat orci nulla pellentesque dignissim. Varius quam quisque id diam. Dolor purus non enim praesent elementum facilisis leo. Volutpat ac tincidunt vitae semper quis. </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Luctus accumsan tortor posuere ac ut consequat semper viverra. Ut tellus elementum sagittis vitae et leo. Ullamcorper dignissim cras tincidunt lobortis feugiat. Magna etiam tempor orci eu lobortis elementum nibh tellus. Malesuada proin libero nunc consequat interdum varius sit amet mattis. Volutpat maecenas volutpat blandit aliquam etiam. Lacinia quis vel eros donec. Gravida dictum fusce ut placerat orci nulla pellentesque dignissim. Varius quam quisque id diam. Dolor purus non enim praesent elementum facilisis leo. Volutpat ac tincidunt vitae semper quis. </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Luctus accumsan tortor posuere ac ut consequat semper viverra. Ut tellus elementum sagittis vitae et leo. Ullamcorper dignissim cras tincidunt lobortis feugiat. Magna etiam tempor orci eu lobortis elementum nibh tellus. Malesuada proin libero nunc consequat interdum varius sit amet mattis. Volutpat maecenas volutpat blandit aliquam etiam. Lacinia quis vel eros donec. Gravida dictum fusce ut placerat orci nulla pellentesque dignissim. Varius quam quisque id diam. Dolor purus non enim praesent elementum facilisis leo. Volutpat ac tincidunt vitae semper quis. </p>
        </div>
    </section>  

    <!----start about---->
    <section class="about" id="about">
        <div class="about-text">
            <h2>Aktualne kursy walut</h2>
            <h5>Euro <span>& Dolar Amerykański</span></h5>
              <div class="portfolio-content">
                <div class="box">
                    <h5>Kurs EUR/PLN Top 100 wyników zapytania SQL</h5>
                    <div id="Euro" ></div>
                </div>

                <div class="box">
                    <h5>Kurs USD/PLN Top 100 wyników zapytania SQL</h5>
                    <div id="Dolar" ></div>
                </div>
              </div>
        </div>
    </section>

     <!----start contact---->
     <section class="contact" id="contact">
        <div class="contact-form">
            <h2>Napisz do nas</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum lobortis risus a magna aliquet
                blandit.</p>
            <form action="">
                <input type="" placeholder="Imię" required>
                <input type="email" name="" id="" placeholder="Adres e-mail" required>
                <input type="" placeholder="Temat" required>
                <textarea name="" id="" cols="30" rows="10" placeholder="Your Massage" required>
                </textarea>
                <input type="submit" name="" value="Wyślij" class="send">
            </form>
        </div>
    </section>

    <!----start footer---->
    <div class="footer">
        <p>Copyright © 2022 Dariusz-Ryszka. All Rights Reserved</p>
    </div>

    <!----link to js ---->
    <script type="text/javascript" src="script.js"></script>
  </body>
</html>

<?php
  // Zamknięcie połączenia z bazą danych
  $connection->close();
?>