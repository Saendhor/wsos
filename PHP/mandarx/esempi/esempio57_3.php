<?php 
    session_start();
    session_regenerate_id(true);
?>
    <!DOCTYPE html>
<html>
<head>
    <title>Sessions</title>
</head>
<body>
    <h3>Sessioni (scadenza alla chiusura del browser)</h3>
    <?php
        $_SESSION['user'] = "Alice";
        $_SESSION['time'] = time();
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
    Controlla lo stato della sessione <a href="esempio57_4.php">qui</a>
</body>
</html>
