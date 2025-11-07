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

        //error_reporting(0); // disattiva la segnalazione di tutti gli errori PHP
        //mysqli_report(MYSQLI_REPORT_OFF); // disabilita le eccezioni e i messaggi di errore generati da MySQLi

        // Crea la connessione
        $conn = new mysqli($servername, $username, $password);

        // Controlla la connessione
        if ($conn->connect_error) //testo descrittivo dell’errore
        {
            die("Connessione fallita: " . $conn->connect_error);
        }
        echo "Connessione effettuata";

        echo "<BR>";
    ?>
</body>
</html>

