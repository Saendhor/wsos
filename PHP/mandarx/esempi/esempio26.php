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

        echo "Query: " . $sql . "<br><br>";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            // output di ogni riga
            while($row = $result->fetch_assoc())
            {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
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

