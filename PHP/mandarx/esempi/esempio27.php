<!DOCTYPE html>
<html>
<head>
    <title>WHERE and LIKE with MySql</title>
</head>
<body>
    <h3>WHERE e LIKE con Mysql:</h3>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";
        
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        // esempio con WHERE
        echo "<h3>Ricerca con WHERE (lastname = 'Doe')</h3>";

        $sql = "SELECT id, firstname, lastname FROM MyGuests WHERE lastname='Doe'";

        echo "Query: " . $sql . "<br><br>";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            // output di ogni riga
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

        // LIKE: inizia con 'J'
        echo "<h3>LIKE: inizia con 'J'</h3>";

        $sql = "SELECT id, firstname, lastname FROM MyGuests WHERE firstname LIKE 'J%'";
        echo "Query: " . $sql . "<br><br>";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo $row["firstname"] . " " . $row["lastname"] . "<br>";
            }
        }
        else
        {
            echo "nessun risultato";
        }

        echo "<br><br>";

        // LIKE: termina con 'e'
        echo "<h3>LIKE: termina con 'e'</h3>";

        $sql = "SELECT id, firstname, lastname FROM MyGuests WHERE firstname LIKE '%e'";
        echo "Query: " . $sql . "<br><br>";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo $row["firstname"] . " " . $row["lastname"] . "<br>";
            }
        }
        else
        {
            echo "nessun risultato";
        }

        echo "<br><br>";

        // LIKE: contiene 'ar'
        echo "<h3>LIKE: contiene 'ar'</h3>";

        $sql = "SELECT id, firstname, lastname FROM MyGuests WHERE firstname LIKE '%ar%'";
        echo "Query: " . $sql . "<br><br>";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo $row["firstname"] . " " . $row["lastname"] . "<br>";
            }
        }
        else
        {
            echo "nessun risultato";
        }

        echo "<br><br>";

        // LIKE: seconda lettera = 'a' usando _
        echo "<h3>LIKE: seconda lettera = 'a' (usa _)</h3>";

        $sql = "SELECT id, firstname, lastname FROM MyGuests WHERE firstname LIKE '_a%'";
        echo "Query: " . $sql . "<br><br>";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo $row["firstname"] . " " . $row["lastname"] . "<br>";
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
