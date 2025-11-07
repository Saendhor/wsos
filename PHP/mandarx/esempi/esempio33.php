<!DOCTYPE html>
<html>
<head>
    <title>External data</title>
</head>
<body>
    <h3></h3>
    <?php
        require("../Private/credentials.php");
        require("functions/connessione.php");
        
        $conn = connect($servername, $username, $password, $dbname);

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

        $conn->close();
    ?>

</body>
</html>
