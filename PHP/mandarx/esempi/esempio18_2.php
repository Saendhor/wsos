<!DOCTYPE html>
<html>
<head>
    <title>Dettaglio prodotto</title>
</head>
<body>

<?php
    echo "<h3>Dettaglio prodotto:</h3>";
    echo "Prodotto: " . $_GET["prodotto"] . "<br>";
    echo "Marca: " . $_GET["marca"] . "<br>";
    echo "Prezzo: €" . $_GET["prezzo"];
?>

</body>
</html>
