<!DOCTYPE html>
<html>
<head>
    <title>XSS Attack - Safe page (GET)</title>
</head>
<body bgcolor="#9dff9d">

<?php
    $prodotto = htmlspecialchars($_GET["prodotto"] ?? "");
    $marca = htmlspecialchars($_GET["marca"] ?? "");
    $prezzo = htmlspecialchars($_GET["prezzo"] ?? "");

    echo "<h3>Dettaglio prodotto:  (sito sicuro)</h3>";
    echo "Prodotto: $prodotto<br>";
    echo "Marca: $marca<br>";
    echo "Prezzo: €$prezzo";
?>

</body>
</html>
