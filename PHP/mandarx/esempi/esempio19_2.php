<!DOCTYPE html>
<html>
<head>
    <title>Form POST - Risultato</title>
</head>
<body>

<?php
    echo "<h3>Dati ricevuti tramite POST:</h3>";
    echo "Nome: " . $_POST["fname"] . "<br>";
    echo "Cognome: " . $_POST["lname"];
?>

</body>
</html>
