<!DOCTYPE html>
<html>
<head>
    <title>Form GET - Risultato</title>
</head>
<body>

<?php
    echo "<h3>Dati ricevuti tramite GET:</h3>";
    echo "Nome: " . $_GET["fname"] . "<br>";
    echo "Cognome: " . $_GET["lname"];
?>

</body>
</html>
