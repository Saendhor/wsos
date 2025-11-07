<!DOCTYPE html>
<html>
<head>
    <title>Select with MySql</title>
</head>
<body>
    <h3>Select con Mysql:</h3>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";
        
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        $id = $_GET['id'] ?? '-1';
        
        if ($id === "" || !is_numeric($id))
        {
            $id = -1;
        }

        $sql = "SELECT * FROM MyGuests WHERE id=$id";

        echo "Query: $sql<br>";
         
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo $row["firstname"] . " " . $row["lastname"] . "<br>";
            }
        }
        else
        {
              echo "nessun risultato";
        }

        $conn->close();
    ?>
</body>
</html>

