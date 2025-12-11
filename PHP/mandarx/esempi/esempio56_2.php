<?php
    $cookieName = "user";
    $cookieValue = "";
    if(isset($_COOKIE[$cookieName]))
        $cookieValue = $_COOKIE[$cookieName];
?>
    <!DOCTYPE html>
<html>
<head>
    <title>Cookies (read)</title>
</head>
<body>
    <h3>Lettura di un cookie:</h3>
    <?php
        if($cookieValue != "")
            echo "il cookie <i>$cookieName</i> ha valore: '$cookieValue'";
        else
            echo "il cookie <i>$cookieName</i> non esiste";
    ?>    
</body>
</html>
