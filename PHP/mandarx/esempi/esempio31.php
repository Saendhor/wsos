<!DOCTYPE html>
<html>
<head>
    <title>DELETE with MySQL</title>
</head>
<body>
    <h3>DELETE con MySQL:</h3>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";
        
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        function mostraTabella($conn)
        {
            $sql = "SELECT * FROM MyGuests";
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
                echo "<table>";
                echo "<tr><th>ID</th><th>Firstname</th><th>Lastname</th><th>Email</th><th>Reg_date</th></tr>";

                while ($row = $result->fetch_assoc())
                {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['firstname']}</td>
                            <td>{$row['lastname']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['reg_date']}</td>
                          </tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "Nessun record trovato.";
            }
        }

        echo "<h3>Tabella prima della cancellazione:</h3>";
        mostraTabella($conn);

        echo "<br><h3>Eseguo cancellazione del record con ID=3</h3>";

        $sql = "DELETE FROM MyGuests WHERE id=3";

        echo "Query: " . $sql . "<br><br>";

        if ($conn->query($sql) === TRUE)
        {
            echo "Record cancellato";
        }
        else
        {
            echo "Errore: " . $conn->error;
        }

        echo "<h3>Tabella dopo la cancellazione:</h3>";
        mostraTabella($conn);

        echo "<br><h3>Eseguo cancellazione di tutti i record...</h3>";

        $sql = "DELETE FROM MyGuests";
        
        echo "Query: " . $sql . "<br><br>";

        if ($conn->query($sql) === TRUE)
        {
            echo "Tutti i record sono stati cancellati";
        }
        else
        {
            echo "Errore: " . $conn->error;
        }

        echo "<h3>Tabella dopo la cancellazione totale:</h3>";
        mostraTabella($conn);

        echo "<br><br>";

        $conn->close();
    ?>
</body>
</html>
