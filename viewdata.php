<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zadanie 3</title>
    </head>
    <body>
        <!-- Stylizacja czcionki i tablicy w CSS-->
        <style>
            *{
                font-family: sans-serif; 
            }
            h1{
                text-align: center;
            }
            h4{
                font-weight: bold;
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
        
        <h1><b>Zadanie 3</b></h1>
        
        <?php
            // Próba połączenia z bazą danych
            try{
                $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
                echo "Sukces! Połączenie z bazą danych powiodło się. </br>";
            } catch(PDOException $e){
                echo "Błąd! Połączenie z bazą danych nie powiodło się. </br>";
            }
        
            // Widok numer 1
            echo "<h4>1. Widok wyświetlający nazwę użytkowników oraz datę ich dodania</h4>";
            try{
                $sql = "SELECT * FROM audit_subscribers WHERE action_performed='Insert a new subscriber'";   
                $result = $pdo->query($sql);
                if($result->rowCount() > 0){
                    echo "<table>";
                        echo "<tr>";
                            // echo "<th>id</th>";
                            echo "<th>User name</th>";
                            // echo "<th>Action</th>";
                            echo "<th>User add date</th>";
                        echo "</tr>";
                        while($row = $result->fetch()){
                            echo "<tr>";
                                // echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['subscriber_name'] . "</td>";
                                // echo "<td>" . $row['action_performed'] . "</td>";
                                echo "<td>" . $row['date_added'] . "</td>";
                            echo "</tr>";  
                        }  
                    echo "</table>";
                    unset($result);
                } else{
                    echo "Brak rekordów w bazie danych do wyświetlenia.";
                }
            }
            catch(PDOException $e){
                die("Błąd! Nie można wprowadzić danych $sql. " . $e->getMessage());
            }

            // Widok numer 2
            echo "<h4>2. Widok wyświetlający nazwę użytkowników oraz datę ich usunięcia </h4>";
            try{
                $sql = "SELECT * FROM audit_subscribers WHERE action_performed='Deleted a subscriber'";   
                $result = $pdo->query($sql);
                if($result->rowCount() > 0){
                    echo "<table>";
                        echo "<tr>";
                            // echo "<th>id</th>";
                            echo "<th>User name</th>";
                            // echo "<th>Action</th>";
                            echo "<th>User delete date</th>";
                        echo "</tr>";
                        while($row = $result->fetch()){
                            echo "<tr>";
                                // echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['subscriber_name'] . "</td>";
                                // echo "<td>" . $row['action_performed'] . "</td>";
                                echo "<td>" . $row['date_added'] . "</td>";
                            echo "</tr>";  
                        }  
                    echo "</table>";
                    unset($result);
                } else{
                    echo "Brak rekordów w bazie danych do wyświetlenia.";
                }
            }
            catch(PDOException $e){
                die("Błąd! Nie można wprowadzić danych $sql. " . $e->getMessage());
            }

            // Widok numer 3
            echo "<h4>3. Widok wyświetlający nazwę użytkowników oraz datę ich edycji</h4>";
            try{
                $sql = "SELECT * FROM audit_subscribers WHERE action_performed='Updated a subscriber'";   
                $result = $pdo->query($sql);
                if($result->rowCount() > 0){
                    echo "<table>";
                        echo "<tr>";
                            // echo "<th>id</th>";
                            echo "<th>User name</th>";
                            // echo "<th>Action</th>";
                            echo "<th>User edit date</th>";
                        echo "</tr>";
                        while($row = $result->fetch()){
                            echo "<tr>";
                                // echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['subscriber_name'] . "</td>";
                                // echo "<td>" . $row['action_performed'] . "</td>";
                                echo "<td>" . $row['date_added'] . "</td>";
                            echo "</tr>";  
                        }  
                    echo "</table>";
                    unset($result);
                } else{
                    echo "Brak rekordów w bazie danych do wyświetlenia.";
                }
            }
            catch(PDOException $e){
                die("Błąd! Nie można wprowadzić danych $sql. " . $e->getMessage());
            }

            // Widok numer 4
            echo "<h4>4. Widok wyświetlający nazwę już usuniętych użytkowników oraz daty ich dodania i usunięcia</h4>";
            try{  
                $sql = "SELECT * FROM audit_subscribers WHERE action_performed='Deleted a subscriber'";
                $result = $pdo->query($sql);
                if($result->rowCount() > 0){
                    echo "<table>";
                        echo "<tr>";
                            // echo "<th>id</th>";
                            echo "<th>User name</th>";
                            // echo "<th>Action</th>";
                            echo "<th>User add date</th>";
                            echo "<th>User delete date</th>";
                        echo "</tr>";
                        while($row = $result->fetch()){
                            echo "<tr>";
                                // echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['subscriber_name'] . "</td>";
                                // echo "<td>" . $row['action_performed'] . "</td>";
                                echo "<td>" . $row['date_added'] . "</td>";
                                echo "<td>" . $row['date_added'] . "</td>";
                            echo "</tr>";  
                        }  
                    echo "</table>";
                    unset($result);
                } else{
                    echo "Brak rekordów w bazie danych do wyświetlenia.";
                }
            }
            catch(PDOException $e){
                die("Błąd! Nie można wprowadzić danych $sql. " . $e->getMessage());
            }

            // Widok numer 5
            echo "<h4>5. Widok wyświetlający tylko istniejących użytkowników (bez korzystania z tabelki subscribers)</h4>";
            try{
                // $sql = "SELECT subscriber_name FROM audit_subscribers";
                // // $sql = "SELECT * FROM audit_subscribers WHERE action_performed='Insert a new subscriber'";  
                // // $sql = "SELECT subscriber_name FROM audit_subscribers WHERE action_performed='Insert a new subscriber' OR action_performed='Updated a subscriber'";  
                // $result = $pdo->query($sql);
                // if($result->rowCount() > 0){
                //     echo "<table>";
                //         echo "<tr>";
                //             // echo "<th>id</th>";
                //             echo "<th>User name</th>";
                //         echo "</tr>";
                //         while($row = $result->fetch()){
                //             echo "<tr>";
                //                 // echo "<td>" . $row['id'] . "</td>";
                //                 echo "<td>" . $row['subscriber_name'] . "</td>";
                //             echo "</tr>";  
                //         }  
                //     echo "</table>";
                //     unset($result);
                // } else{
                //     echo "Brak rekordów w bazie danych do wyświetlenia.";
                // }

                $sql1 = "SELECT subscriber_name AS 'in' FROM audit_subscribers WHERE action_performed='Insert a new subscriber'"; 

                $sql2 = "SELECT subscriber_name AS 'dn' FROM audit_subscribers WHERE action_performed='Deleted a subscriber'";
                // OR action_performed='Updated a subscriber'

                $result1 = $pdo->query($sql1);
                $result2 = $pdo->query($sql2);   

                // $i=0;
                // while($row1 = $result1->fetch())
                // {
                //     $row1['in'] = $tab[$i];
                //     $i++
                // };
                
                if($result1->rowCount() > 0 ){
                    echo "<table>";
                    echo "<tr>";
                        echo "<th>User name</th>";
                    echo "</tr>";
                    // while($row1 = $result1->fetch()){
                    //     while($row2 = $$result2->fetch()){
                    //         if($row1['subscriber_name'] != $row2['subscriber_name']){
                    //             echo "<tr>";
                    //                 echo "<td>" . $row1['subscriber_name'] . "</td>";
                    //             echo "</tr>";  
                    //             }else {
                    //                 continue;
                    //             }

                    //         // echo "<tr>";
                    //         //     echo "<td>" . $row1['in'] . "</td>";
                    //         // echo "</tr>";
                    //         // for($i=0; $i<=$result2->num_rows;$i++)    
                    //         while($row2 = $result2->fetch()){
                    //         if($row1['in'] == $row2['dn']){
                    //         echo "<tr>";
                    //             echo "<td>" . $row1['in'] . "</td>";
                    //         echo "</tr>";
                    //         break;
                    //         }
                    //     }    
                    // }  

                // $rows1 = $result1->fetchAll();
                // print_r($rows1);    
                // // $temp = explode(", ", $rows1);
                
                // $rows2 = $result2->fetchAll();
                // print_r($rows2);        

                // array_intersect($rows1, $rows2);
                // echo "<tr>";
                //     echo "<td>" . $row1['in'] . "</td>";
                // echo "</tr>";
                // $result = array_diff($rows1, $rows2);
                // print_r($result);


                    // for($i=1;$i<=$result1->fetch();$i++)
                    // {
                    //     $row1=$result1->fetch();

                    //     for($j=1;$j<=$result2->fetch();$j++)
                    //     {
                    //         $row2=$result2->fetch();

                    //         if($row1['in'] == $row2['dn'])
                    //         {
                    //             echo "<tr>";
                    //                 echo "<td>" . $row1['in'] . "</td>";
                    //             echo "</tr>";
                    //             break;
                    //         }
                    //     }
                    // }

                    while($row1 = $result1->fetch())
                    {
                        while($row2 = $result2->fetch())
                        {
                            if($row1['in'] != $row2['dn'])
                            {
                                echo "<tr>";
                                    echo "<td>" . $row1['in'] . "</td>";
                                echo "</tr>";
                                break;
                            }
                            else
                            {
                                continue;
                            }
                        }    
                    }  
                        echo "</table>";
                        unset($result1, $result2 );
                    } else{
                        echo "Brak rekordów w bazie danych do wyświetlenia.";
                    }
                    
                }       
            catch(PDOException $e){
                die("Błąd! Nie można wprowadzić danych $sql. " . $e->getMessage());
            }

            // Zamknięcie połączenia z bazą danych
            unset($pdo);
        ?>
    </body>
</html>