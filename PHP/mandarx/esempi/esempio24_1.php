<!DOCTYPE html>
<html>
<head>
    <title>Connection with MySql</title>
</head>
<body>
    <h3>Connessione con MySql:</h3>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";

        // Crea la connessione
        $conn = new mysqli($servername, $username, $password);

        // Controlla la connessione
        if ($conn->connect_error) //testo descrittivo dell’errore
        {
            die("Connessione fallita: " . $conn->connect_error);
        }
        echo "Connessione effettuata";

        echo "<BR>";
        /*
        //alterantiva
        try
        {
            $conn = @new mysqli($servername, $username, $password);

            if ($conn->connect_errno) //numero dell’errore
            {
                echo "Connessione fallita: " . $conn->connect_error;
            }
            else
            {
                echo "Connessione effettuata.";
            }
        }
        catch (Exception $e)
        {
            echo "Errore durante la connessione: " . $e->getMessage();
        }
        */
    ?>
</body>
</html>

