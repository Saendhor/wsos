<!DOCTYPE html>
<html>
<head>
    <title>Create table</title>
</head>
<body>
    <h3>Creo la tabella MailingList per poter eseguire l'esempio:</h3>
    <?php
        require("../Private/credentials.php");
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        $sql = "CREATE TABLE MailingList (email VARCHAR(100) PRIMARY KEY, confirmed TINYINT(1) DEFAULT 0)";

        echo "Query: " . $sql . "<br><br>";

        if ($conn->query($sql) === TRUE)
        {
            echo "Tabella MailingList creata.<br>";
            echo "Clicca <a href='esempio36_2.php'>qui</a> per passare all'esempio.";
        }
        else
        {
            echo "Errore: " . $conn->error;
        }


        $conn->close();
    ?>
</body>
</html>
