<!DOCTYPE html>
<html>
<head>
    <title>ORDER BY with MySql</title>
</head>
<body>
    <h3>ORDER BY con Mysql:</h3>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";
        
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        // ORDER BY crescente (ASC di default)
        echo "<h3>Ordine Crescente per lastname (ASC)</h3>";

        $sql = "SELECT id, firstname, lastname FROM MyGuests ORDER BY lastname";
        
        echo "Query: " . $sql . "<br><br>";

        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            // Output di ogni riga
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

        // ORDER BY decrescente (DESC)
        echo "<h3>Ordine Decrescente per lastname (DESC)</h3>";

        $sql = "SELECT id, firstname, lastname FROM MyGuests ORDER BY lastname DESC";
        
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
