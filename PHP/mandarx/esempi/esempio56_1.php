<?php
    $cookieName = "user";
    $cookieValue = "John Doe";
//    $cookieDuration = time() + 10; // 10 secondi
//    $cookieDuration = time() + 60; // 1 minuto
//    $cookieDuration = time() + 3600; // 1 ora
//    $cookieDuration = time() + 86400; // 1 giorno
    $cookieDuration = time() + 86400 * 30; // 1 mese 

    setcookie($cookieName, $cookieValue, $cookieDuration, "/");
?>
    <!DOCTYPE html>
<html>
<head>
    <title>Cookies (create)</title>
</head>
<body>
    <h3>Creazione di un cookie:</h3>
    <?php
        echo "cookie creato: <i>$cookieName</i>, valore: '$cookieValue', durata: $cookieDuration<br>";
    ?>
    Leggi il cookie <a href="esempio56_2.php">qui</a>
</body>
</html>
