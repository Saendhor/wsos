<!DOCTYPE html>
<html>
<head>
    <title>Superglobals</title>
</head>
<body>

<?php
    echo "<h3>Informazioni sul server e sul client</h3>";

    echo "Nome file PHP: " . $_SERVER['PHP_SELF'] . "<br>";
    echo "Nome del server: " . $_SERVER['SERVER_NAME'] . "<br>";
    echo "Host: " . $_SERVER['HTTP_HOST'] . "<br>";
    echo "Indirizzo IP del client: " . $_SERVER['REMOTE_ADDR'] . "<br>";
    echo "User Agent (browser e sistema operativo): " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
    echo "Lingua preferita del browser: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br>";
?>

</body>
</html>
