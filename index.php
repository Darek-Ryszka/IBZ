<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 1</title>
</head>
<body>
    <style>
        *{
            font-family: sans-serif;
            text-align: center;
        }
    </style>    
    <h1>Zadanie 1</h1>
    <h5>Dariusz Ryszka D3 146325</h5>
    <!-- Kod zadania 1 -->
    <?php
        $adres = "localhost";
        $użytkownik = "Darek";
        $hasło = "Darek123";
        $nazwabazy = "baza";

        echo "Hello World <br>";

        try {
            $conn = new PDO("mysql:host=$adres;dbname=$nazwabazy", $użytkownik, $hasło);
            echo "Sukces ! Połączenie z bazą danych powiodło się";
          } catch(PDOException $e) {
            echo "Błąd ! Połączenie z bazą danych nie powiodło się";
          }
        $conn = null;  
    ?>
    <!-- Koniec zadania 1 -->
</body>
</html>
