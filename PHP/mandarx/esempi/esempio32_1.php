<!DOCTYPE html>
<html>
<head>
    <title>DELETE with MySQL</title>
</head>
<body>
    <h3>Creazione di record sufficienti</h3>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";
        
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        require("functions/generateRecords.php");

        $res = reachRecordQuantity($conn, "MyGuests", 10, ["firstname" => "name", "lastname"  => "surname", "email"     => "email"]);
        if($res >= 0)
        {
            echo "<p>Creati $res utenti.</p>";
            echo "clicca <a href='esempio32_2.php'>qui</a> per passare all'esempio.";
        }
        else
        {
            echo "errore";
        }
    ?>
</body>
</html>
