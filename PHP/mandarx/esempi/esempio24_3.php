<!DOCTYPE html>
<html>
<head>
    <title>Creatig DBs with MySql</title>
</head>
<body>
    <h3>Creazione di un database con Mysql:</h3>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";

        try
        {
            $conn = @new mysqli($servername, $username, $password);
            
            if ($conn->connect_errno) //numero dell’errore
            {
                die ("Connessione fallita: " . $conn->connect_error);
            }
            else
            {
                echo "Connessione effettuata.<br>";
            }
        }
        catch (Exception $e)
        {
            die ("Errore durante la connessione: " . $e->getMessage());
        }
        

        $sql = "CREATE DATABASE $dbname";

        echo "Query: " . $sql . "<br><br>";

        if ($conn->query($sql) === true)
        {
            echo "Database creato";
        }
        else
        {
            echo "Errore: " . $conn->error;
        }

        $conn->close(); //rilascia la connessione

    ?>
</body>
</html>

