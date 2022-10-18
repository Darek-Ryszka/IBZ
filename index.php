<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zadanie 2</title>
    </head>
    <body>
        <!-- Stylizacja czcionki w CSS-->
        <style>
            *{
                font-family: sans-serif; 
            }
            .navbar{
                font-family: sans-serif;
                text-align: center;
            }
        </style> 
        
        <h1 class=navbar>Zadanie 1</h1>
        <h5 class=navbar>Dariusz Ryszka D3 146325</h5>
        <h4><b>Dodaj użytkownika</b></h4>

        <!-- Forma w HTML-->
        <form action="" method="post">
            <p>
                <label for="firstName">Imie:</label></br>
                <input type="text" name="fname" id="firstName" required>
            </p>
            <p>
                <label for="emailAddress">Email:</label></br>
                <input type="email" name="email" id="emailAddress" required>
            </p>
            <input type="submit" name="insert" value="Register Subscriber">
        </form>

        <?php 
        // Próba połaczenia z bazą danych
        if(isset($_POST['insert']))
        {
                try{
                    $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
                    echo "Sukces! Połączenie z bazą danych powiodło się. </br>";
                } catch(PDOException $e){
                    echo "Błąd! Połączenie z bazą danych nie powiodło się. </br>";
                }

                // Próba wprowadzenia danych do tabeli
                try{
                $sql = "INSERT INTO subscribers (fname, email) VALUES (:first_name, :email)";
                $stmt = $pdo->prepare($sql);
                
                // Przypisanie do pól tekstowych
                $stmt->bindParam(':first_name', $_REQUEST['fname']);
                $stmt->bindParam(':email', $_REQUEST['email']);
                
                // Próba wykonania polecenia
                
                $stmt->execute();
                echo "Sukces! Dane wprowadzono poprawnie.";
            } catch(PDOException $e){
                die("Błąd! Nie można wprowadzić danych $sql. " . $e->getMessage());
            }
        }
        // Zamknięcie połączenia z bazą danych
        unset($pdo);
        ?>   
    </body>
</html>
