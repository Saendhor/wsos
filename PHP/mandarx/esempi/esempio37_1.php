<!DOCTYPE html>
<html>
<head>
    <title>Create table</title>
</head>
<body>
    <h3>Ricreo la tabella MyGuests per poter eseguire l'esempio:</h3>
    <?php
        require("../Private/credentials.php");
        require("functions/connessione.php");
        require("functions/generateRecords.php");

        $conn = connect($servername, $username, $password, $dbname);
        $sql = "DROP TABLE MyGuests;";
        $conn->query($sql);

        $sql = "CREATE TABLE MyGuests (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50),
                password VARCHAR(50) NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

        echo "Query: " . $sql . "<br><br>";

        if ($conn->query($sql) === TRUE)
        {
            echo "Tabella MyGuests creata.<br>";
        }
        else
        {
            echo "Errore: " . $conn->error;
        }

        $res = reachRecordQuantity($conn, "MyGuests", 10, ["firstname" => "name", "lastname"  => "surname", "email" => "email", "password" => "password"]);
        if($res >= 0)
        {
            echo "<p>Creati $res utenti.</p>";
            echo "clicca <a href='esempio37_2.php'>qui</a> per passare all'esempio.";
        }
        else
        {
            echo "errore";
        }

        $conn->close();
    ?>
</body>
</html>
