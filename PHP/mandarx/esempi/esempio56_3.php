<?php
    $cookieName = "user";
    $cookieValue = "Alex Porter";
    $cookieDuration = time() + 86400 * 30; // 1 mese 

    setcookie($cookieName, $cookieValue, $cookieDuration, "/");
?>
    <!DOCTYPE html>
<html>
<head>
    <title>Cookies (modify)</title>
</head>
<body>
    <h3>Modifica di un cookie:</h3>
    <?php
        echo "cookie: <i>$cookieName</i> modificato, valore: '$cookieValue', durata: $cookieDuration<br>";
    ?>
    Leggi il cookie <a href="esempio56_2.php">qui</a>
</body>
</html>
