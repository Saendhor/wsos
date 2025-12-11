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

        // query costruita con concatenazione: vulnerabile a SQL injection
        $sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests WHERE firstname = '$nome' AND lastname = '$cognome'";

        echo "Query: " . $sql . "<br><br>";

        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0)
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

        $conn->close();
    ?>
</body>
</html>
