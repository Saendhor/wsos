<?php
    session_start();
?>
    <!DOCTYPE html>
<html>
<head>
    <title>Sessions</title>
</head>
<body>
    <h3>Sessioni (scadenza rapida)</h3>
    <?php
        echo "ID di sessione: " . session_id() . "<br>";

        if (isset($_SESSION['name']))
        {
            echo "Sessione valida.<br>";
            echo "Dati salvati: {$_SESSION['name']} e {$_SESSION['time']} (". date("H:i:s", $_SESSION['time']) .")<br>";
        }
        else
        {
            echo "Sessione scaduta.<br>";
            echo 'Clicca <a href="esempio57_1.php">qui</a> per crearne una nuova.';
        }
    ?>
</body>
</html>
