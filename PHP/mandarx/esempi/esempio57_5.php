<?php 
    $secondi_in_un_anno = 31536000; // secondi in un anno
    session_set_cookie_params($secondi_in_un_anno);
    session_start();
    session_regenerate_id(true); // nuovo cookie persistente
?>
    <!DOCTYPE html>
<html>
<head>
    <title>Sessions</title>
</head>
<body>
    <h3>Sessioni persistenti (rimangono attive anche dopo la chiusura del browser)</h3>
    <?php
        $_SESSION['username'] = "Charlie";
        $_SESSION['time'] = time();
        $_SESSION['expiration'] = time() + $secondi_in_un_anno;
        $_SESSION['lang'] = "it";

        echo "Sessione creata.<br>";
        echo "ID di sessione: " . session_id() . "<br><br>";

        // verifichiamo il cookie PHPSESSID
        if (isset($_COOKIE[session_name()]))
        {
            echo "Cookie di sessione presente.<br>";
        }
        else
        {
            echo "Cookie di sessione assente o scaduto.<br>";
        }
    ?>
    Controlla lo stato della sessione <a href="esempio57_6.php">qui</a>
</body>
</html>
