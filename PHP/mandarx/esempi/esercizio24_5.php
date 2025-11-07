<!DOCTYPE html>
<html>
<head>
    <title>Getting latest ID with MySql</title>
</head>
<body>
    <h3>Ottenere l'utimo ID con Mysql:</h3>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";
        
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);
        
        // differenza tra include e require
        //include "nome file"; // se manca, lo script continua
        //require "nome file"; // se manca, lo script si ferma

        $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Jack', 'Black', 'jack@black.com')";

        if ($conn->query($sql) === TRUE)
        {
            $last_id = $conn->insert_id;
            echo "Dati inseriti. Ultimo id: " . $last_id = $conn->insert_id;
        }
        else
        {
            echo "Errore: " . $conn->error;
        }

        $conn->close();
    ?>
</body>
</html>

