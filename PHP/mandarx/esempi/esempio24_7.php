<!DOCTYPE html>
<html>
<head>
    <title>Insert multiple records with MySql</title>
</head>
<body>
    <h3>Inserire record multipli con Mysql:</h3>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";

        try
        {
            $conn = @new mysqli($servername, $username, $password, $dbname);
            
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

        $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com');";
        $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Mary', 'Moe', 'mary@example.com');";
        $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Julie', 'Dooley', 'julie@example.com')";

        echo "Query: " . $sql . "<br><br>";
        
        if ($conn->multi_query($sql) === TRUE)
        {
            //$last_id = $conn->insert_id;
            echo "Dati inseriti.";
        }
        else
        {
            echo "Errore: " . $conn->error;
        }

        $conn->close();
    ?>
</body>
</html>

