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

        try
        {
            $conn = @new mysqli($servername, $username, $password);
            // l’operatore @ in PHP sopprime la visualizzazione di errori e avvisi generati da quell’istruzione.
            
            if ($conn->connect_errno) //numero dell’errore
            {
                die ("Connessione fallita: " . $conn->connect_error);
            }
            else
            {
                echo "Connessione effettuata.";
            }
        }
        catch (Exception $e)
        {
            die ("Errore durante la connessione: " . $e->getMessage());
        }
    ?>
</body>
</html>

