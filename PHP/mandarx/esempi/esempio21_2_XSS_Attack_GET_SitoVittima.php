<!DOCTYPE html>
<html>
<head>
    <title>XSS Attack - Unsafe page (GET)</title>
</head>
<body bgcolor="#ff9d9d">
<?php
    $prodotto = $_GET["prodotto"] ?? "";
    $marca = $_GET["marca"] ?? "";
    $prezzo = $_GET["prezzo"] ?? "";

    echo "<h3>Dettaglio prodotto: (sito vittima)</h3>";
    echo "Prodotto: $prodotto<br>";
    echo "Marca: $marca<br>";
    echo "Prezzo: €$prezzo";
?>

</body>
</html>
