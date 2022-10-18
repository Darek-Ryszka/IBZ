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
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
            }
            table {
                width:100%
            }
        </style>    

        <h2><b>Wyświetl użytkowników</b></h2>
        <h4><b>Delete - powoduje usunięcie użytkownika, oraz uruchomienie wyzwalacza po usunięciu.</b></h4>
        <h4><b>Edit - po edycji użytkownika zostanie uruchomiony wyzwalacz.</b></h4>

        <?php
            try{
                $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
                echo "Sukces! Połączenie z bazą danych powiodło się. </br>";
            } catch(PDOException $e){
                echo "Błąd! Połączenie z bazą danych nie powiodło się. </br>";
            }

            try{
                $sql = "SELECT * FROM subscribers";   
                $result = $pdo->query($sql);
                if($result->rowCount() > 0){
                    echo "<table>";
                        echo "<tr>";
                            echo "<th>id</th>";
                            echo "<th>Name</th>";
                            echo "<th>Email</th>";
                            echo "<th>Action</th>";
                        echo "</tr>";
                    while($row = $result->fetch()){
                        echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['fname'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>";
                            echo "<div class='btn-group'>";
                            echo "<a class='btn-edit' href='./subscriber_edit.php?id=" .$row['id'] ."'>Edit |</a>";
                            echo "<a class='btn-delete' href='./subscriber_del.php?id=" .$row['id'] ."'> Delete</a>";
                            echo "</div>";
                            echo "</td>";    
                        echo "</tr>";
                    }
                    echo "</table>";
                    // Free result set
                    unset($result);
                } else{
                    echo "Brak rekordów w bazie danych do wyświetlenia.";
                }
            } catch(PDOException $e){
                die("ERROR: Could not able to execute $sql. " . $e->getMessage());
            }
            // Zamknięcie połączenia z bazą danych
            unset($pdo);
        ?>
    </body>
</html>