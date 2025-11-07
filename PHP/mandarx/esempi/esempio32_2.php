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

        mostraTabella($conn);

        ?>

        <h3>Cancella un record</h3>
        <form action="esempio32_3.php" method="POST">
            <label for="id">Inserisci l'ID del record da cancellare:</label><br>
            <input type="number" name="id" id="id" required><br><br>
            <input type="submit" name="submit" value="Elimina record">
        </form>

        <?php
            $conn->close();
        ?>
</body>
</html>
