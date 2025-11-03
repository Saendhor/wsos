<!DOCTYPE html>
<html>
<head>
    <title>Creatig tables with MySql</title>
</head>
<body>
    <h3>Creazione di tabelle con Mysql:</h3>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error)
        {
            die("Connessione fallita: " . $conn->connect_error);
        }
        echo "Connessione effettuata";

        echo "<BR>";


        // sql
        $sql = "CREATE TABLE MyGuests (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

        if ($conn->query($sql) === TRUE)
        {
            echo "Tabella MyGuests creata";
        }
        else
        {
            echo "Errore: " . $conn->error;
        }

        $conn->close();
    ?>
</body>
</html>

