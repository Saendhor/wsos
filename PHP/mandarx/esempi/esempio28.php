<!DOCTYPE html>
<html>
<head>
    <title>LIMIT and OFFSET with MySql</title>
</head>
<body>
    <h3>LIMIT e OFFSET con Mysql:</h3
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";
        
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        echo "<h3>Primi 5 record (LIMIT)</h3>";

        $sql = "SELECT id, firstname, lastname FROM MyGuests LIMIT 5";
        
        echo "Query: " . $sql . "<br><br>";

        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
            }
        }
        else
        {
            echo "nessun risultato";
        }

        echo "<br><br>";

        // LIMIT + OFFSET: mostra 5 record a partire dal 4° (OFFSET 5)
        echo "<h3>Record dal 5° al 10° (LIMIT + OFFSET)</h3>";

        $sql = "SELECT id, firstname, lastname FROM MyGuests LIMIT 5 OFFSET 4";
        echo "Query: " . $sql . "<br><br>";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
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
