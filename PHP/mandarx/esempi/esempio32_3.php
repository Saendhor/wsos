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

        define("DEBUG", 1);

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

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"]) && isset($_POST["id"]))
        {
            $id = intval($_POST["id"]);

            if (DEBUG)
            {
                echo "<h3>Tabella prima della cancellazione:</h3>";
                mostraTabella($conn);
            }

            echo "<h3>Controlo se il record con ID=$id esiste</h3>";

            $sql = "SELECT * FROM MyGuests WHERE id=$id";

            $result = $conn->query($sql);
            if ($result->num_rows == 0)
            {
                echo "<h3>Il record con ID=$id non esiste</h3>";
                exit;
            }

            echo "<h3>Eseguo cancellazione del record con ID=$id</h3>";

            $sql = "DELETE FROM MyGuests WHERE id=$id";
            if (DEBUG)
                echo "Query: $sql<br><br>";

            if ($conn->query($sql))
            {
                echo "Record con ID $id cancellato.<br><br>";
            }
            else
            {
                echo "Errore: " . $conn->error . "<br><br>";
            }

            if (DEBUG)
            {
                echo "<h3>Tabella dopo la cancellazione:</h3>";
                mostraTabella($conn);
            }
        }
        else
        {
            header("location: esempio32_2.php");
        }
        
        $conn->close();
    ?>
</body>
</html>
