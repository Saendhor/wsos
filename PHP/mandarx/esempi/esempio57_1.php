<?php 
    session_set_cookie_params(10); // la sessione scade dopo 10 secondi
    session_start();
    session_regenerate_id(true); // forza la creazione di un nuovo ID e invia un nuovo cookie PHPSESSID
?>
    <!DOCTYPE html>
<html>
<head>
    <title>Sessions</title>
</head>
<body>
    <h3>Sessioni (scadenza rapida)</h3>
    <?php
        $_SESSION['name'] = "Marty";
        $_SESSION['time'] = time();
        echo "Sessione creata.<br>";
        echo "ID di sessione: " . session_id() . "<br><br>";

        echo "Nome di sessione: " . session_name() . "<br><br>";

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
    Controlla lo stato della sessione <a href="esempio57_2.php">qui</a>
</body>
</html>
