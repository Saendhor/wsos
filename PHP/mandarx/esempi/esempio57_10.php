<?php
session_start();

// rimuove tutte le variabili di sessione
$_SESSION = [];

// cancella il cookie della sessione
if (ini_get("session.use_cookies"))
{
    $params = session_get_cookie_params();

    setcookie
    (
        session_name(),
        '',
        time() - 3600,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// distrugge la sessione
session_destroy();

header("Location: esempio57_8.php");
exit;
?>
