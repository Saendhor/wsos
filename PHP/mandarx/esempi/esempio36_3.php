<!DOCTYPE html>
<html>
<head>
    <title>Sql Injection</title>
</head>
<body>
    <h3>Sql Injection:</h3>
    <?php
        require("../Private/credentials.php");
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        if (!isset($_POST['nome']) || $_POST['nome'] === '' || !isset($_POST['cognome']) || $_POST['cognome'] === '')
        {
            header ("location: esempio35_1.php");
        }

        $nome = $_POST['nome']; // <-- INPUT NON SANIFICATO
        $cognome = $_POST['cognome']; // <-- INPUT NON SANIFICATO
        $email = $_POST['email']; // <-- INPUT NON SANIFICATO

        // query costruita con concatenazione: vulnerabile a SQL injection
        $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('$nome', '$cognome', '$email');";
        $sql .= "INSERT INTO MailingList (email) VALUES ('$email');";

        echo "Query: " . $sql . "<br><br>";

        if ($conn->multi_query($sql) === TRUE)
        {
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
