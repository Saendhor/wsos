<?php
    $cookieName = "user";
    $cookieDuration = time() - 3600;
    setcookie($cookieName, "", $cookieDuration);
?>
    <!DOCTYPE html>
<html>
<head>
    <title>Cookies (delete)</title>
</head>
<body>
    <h3>Cancellazione di un cookie:</h3>
    <?php
        echo "cookie: <i>$cookieName</i> cancellato (durata: $cookieDuration)<br>";
    ?>
    Controlla se il cookie esiste <a href="esempio56_2.php">qui</a>
</body>
</html>
