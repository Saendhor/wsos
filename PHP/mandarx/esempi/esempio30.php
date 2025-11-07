<!DOCTYPE html>
<html>
<head>
    <title>UPDATE with MySql</title>
</head>
<body>
    <h3>UPDATE con Mysql:</h3>
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

            echo "Query: " . $sql . "<br><br>";

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

        echo "<h3>Tabella prima dell’aggiornamento:</h3>";
        mostraTabella($conn);

        echo "<br><h3>Eseguo aggiornamento del record con ID=2</h3>";

        $sql = "UPDATE MyGuests SET lastname='Foe' WHERE id=2";
        
        echo "Query: " . $sql . "<br><br>";

        if ($conn->query($sql) === TRUE)
        {
            echo "Record aggiornato";
        }
        else
        {
            echo "Errore: " . $conn->error;
        }

        echo "<h3>Tabella dopo l’aggiornamento:</h3>";
        mostraTabella($conn);

        echo "<br><br>";


        $conn->close();
    ?>
</body>
</html>
