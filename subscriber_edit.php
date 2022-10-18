<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zadanie 2</title>
    </head>
    <body>
        <style>
            *{
                font-family: sans-serif; 
            }
        </style>

        <h4><b>Edytuj użytkownika</b></h4>

        <?php
            try{
                $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
                echo "Sukces! Połączenie z bazą danych powiodło się. </br>";
            } catch(PDOException $e){
                echo "Błąd! Połączenie z bazą danych nie powiodło się. </br>";
            }
            
            if(!isset($_GET['id'])){
                die('Błędne id');
            }    
            
            $id = $_GET['id'];
            $sql = "SELECT * FROM subscribers WHERE id = $id";
            $result = $pdo->query($sql);
            if($result->rowCount() != 1){
                die ('Nie ma takiego id w bazie danych');
            }
            $row = $result->fetch();

            // Zamknięcie połączenia z bazą danych
            unset($pdo);    
        ?>

        <form action="" method="post">
            <p>
                <label for="firstName">Imie:</label></br>
                <input type="text" name="fname" id="firstName" value="<?= $row['fname']?>">
            </p>
            <p>
                <label for="emailAddress">Email:</label></br>
                <input type="email" name="email" id="emailAddress" value="<?= $row['email']?>">
            </p>
            <input type="submit" name="insert" value="Zatwierdź zmiany">
        </form>
    </body>
</html>