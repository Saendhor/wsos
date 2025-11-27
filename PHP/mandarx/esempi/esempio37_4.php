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

        if (!isset($_POST['nome']) || $_POST['nome'] === '' || !isset($_POST['cognome']) || $_POST['cognome'] === '')
        {
            header ("location: esempio37_3.php");
        }

        //soluzioni per prevenire l'SQL Injection

        // uso real_escape_string per sostituire i caratteri riservati all'SQL
        $nome = $conn->real_escape_string($_POST['nome']);
        $cognome = $conn->real_escape_string($_POST['cognome']);

        // prepared statement: la query e i dati sono separati
        $sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests WHERE firstname = ? AND lastname = ?";

        if ($stmt = $conn->prepare($sql))
        {
            $stmt->bind_param("ss", $nome, $cognome); // due stringhe -> "ss"

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

            $stmt->close();
        }
        else
        {
            echo $conn->error;
        }

        $conn->close();
    ?>
</body>
</html>
