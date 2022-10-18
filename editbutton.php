<?php
    // Próba połączenia z bazą danych
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
        echo "Sukces! Połączenie z bazą danych powiodło się. </br>";
    } catch(PDOException $e){
        echo "Błąd! Połączenie z bazą danych nie powiodło się. </br>";
    }

    if(isset($_GET['id']) && isset($_POST['edit'])){
        $id = $_GET['id'];
        $name = $_POST['fname'];
        $email = $_POST['email'];

        $sql = "UPDATE subscribers SET 
        fname = '$name',
        email = '$email'
        WHERE id = $id"; 

        if($pdo->query($sql) == TRUE){
            echo "<b>Dane użytkownika zmienione.<b>";
        }else{
            echo "Błąd! Nie można zmienić danych użytkownika.";
        }

    }else{
        echo "cos";
    }
    // Zamknięcie połączenia z bazą danych
    unset($pdo);
?>            