<?php
    // Próba połączenia z bazą danych
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
        echo "Sukces! Połączenie z bazą danych powiodło się. </br>";
    } catch(PDOException $e){
        echo "Błąd! Połączenie z bazą danych nie powiodło się. </br>";
    }
    // Próba pobrania id i usunięcia użytkownika o pobranym id
    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $sql = "DELETE FROM subscribers WHERE id = $id";

        if($pdo->query($sql) == TRUE){
            echo "<b>Usunięto użytkownika<b>";
        }else{
            echo "Błąd! Nie można usunąć użytkownika";
        }

    }else{
        die('Błędne id');
    }
    // Zamknięcie połączenia z bazą danych
    unset($pdo);
?>