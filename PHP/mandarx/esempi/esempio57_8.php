<?php
// cookie sicuri
session_set_cookie_params
([
    'lifetime' => 0, // sessione fino alla chiusura
    'path' => '/', // il cookie è valido per tutto il sito
    //'secure' => true, // solo HTTPS
    'httponly' => true, // JS non può leggerlo
    'samesite' => 'Strict', // il cookie viene inviato solo se la navigazione avviene dentro lo stesso sito (può impedire login tramite link esterni.)
]);

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // credenziali verificate con successo
    $_SESSION['user'] = $_POST['username'];

    // protezione contro session fixation
    session_regenerate_id(true);

    header("Location: esempio57_9.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Secure Sessions</title></head>
<body>
<h1>Sessioni Sicure</h1>
<form method="POST">
    Username: <input type="text" name="username">
    <input type="submit" value="Accedi">
</form>

</body>
</html>
