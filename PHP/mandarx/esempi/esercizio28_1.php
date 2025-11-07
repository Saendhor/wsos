<!DOCTYPE html>
<html>
<head>
    <title>Pagination with LIMIT and OFFSET</title>
</head>
<body>
    <h3>Creazione record sufficienti</h3>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";
        
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);
        
        require("functions/generateRecords.php");

        $res = reachRecordQuantity($conn, "MyGuests", 100, ["firstname" => "name", "lastname" => "surname", "email" => "email"]);
        if($res >= 0)
        {
            echo "<p>Creati $res utenti.</p>";
            echo "clicca <a href='esercizio28_2.php'>qui</a> per passare all'esercizio.";
        }
        else
        {
            echo "errore";
        }
    ?>
</body>
</html>
