<!DOCTYPE html>
<html>
<head>
    <title>Creatig DBs with MySql</title>
</head>
<body>
    <h3>Creazione di un database con Mysql:</h3>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";

        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error)
        {
            die("Connessione fallita: " . $conn->connect_error);
        }
        echo "Connessione effettuata";

        echo "<BR>";
        
        // Crea un database
        $sql = "CREATE DATABASE $dbname";
        if ($conn->query($sql) === true)
        {
            echo "Database creato";
        }
        else
        {
            echo "Errore: " . $conn->error;
        }

        $conn->close(); //rilascia la connessione

    ?>
</body>
</html>

