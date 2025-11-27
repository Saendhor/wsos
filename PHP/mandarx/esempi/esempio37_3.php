<!DOCTYPE html>
<html>
<head>
    <title>Failed Sql Injection</title>
</head>
<body>
    <h3>Sql Injection fallito:</h3>
    <?php
        require("../Private/credentials.php");
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        if (!isset($_POST['id']) || $_POST['id'] === '')
        {
            header ("location: esempio37_2.php");
        }

        //soluzioni per prevenire l'SQL Injection
        $id = $_POST['id'];
        
        $id = $conn->real_escape_string($id); // uso real_escape_string per sostituire i caratteri riservati all'SQL

        $id = intval($_POST['id']); // forzare un intero è un buona pratica per dati numerici

        // prepared statement: la query e i dati sono separati
        $sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests WHERE id = ?";

        if ($stmt = $conn->prepare($sql))
        {
            $stmt->bind_param("i", $id); // intero

            if ($stmt->execute())
            {
                $result = $stmt->get_result();

                if ($result)
                {
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            echo "<p>" . $row['id'] . " - " . $row['firstname'] . " " . $row['lastname'] . " (" . $row['email'] . ")</p>";
                        }
                    }
                    else
                    {
                        echo "Nessun risultato.";
                    }

                    $result->free();
                }
                else
                {
                    echo "Nessun risultato.";
                }
            }
            else
            {
                echo "Errore "  . $stmt->error;
            }

            $stmt->close();
        }
        else
        {
            echo "Errore " . $conn->error;
        }
        
        $conn->close();
    ?>
</body>
</html>
