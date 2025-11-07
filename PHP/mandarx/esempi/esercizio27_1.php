<!DOCTYPE html>
<html>
<head>
    <title>Select with MySql</title>
</head>
<body>
    <h3>Select con Mysql:</h3>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";
        
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        $sql = "SELECT id, firstname, lastname FROM MyGuests";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo '<a href="esercizio27_2.php?id=' . urlencode($row["id"]) . '">ID utente:' . $row["id"] . '</a><br>';
            }
        }
        else
        {
              echo "nessun risultato";
        }

        $conn->close();
    ?>
</body>
</html>

