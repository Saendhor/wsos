<?php 
    session_start();
    if (!isset($_SESSION['username']))
    {
        header("Location: esempio57_5.php");
        exit;
    }

    $messaggi =
    [
        'it' =>
        [
            'lingua' => "Lingua attuale",
            'cambia' => "Cambia lingua",
            'sessione_valida' => "Sessione valida",
            'dati_salvati' => "Dati salvati",
            'id_sessione' => "ID di sessione",
            'creazione' => "Data di creazione",
            'scadenza' => "Scadenza",
            'vai_saluti' => "Vai alla pagina dei saluti",
            'clicca_qui' => "Clicca qui",
        ],
        'en' =>
        [
            'lingua' => "Current language",
            'cambia' => "Change language",
            'sessione_valida' => "Valid session",
            'dati_salvati' => "Data saved",
            'id_sessione' => "Session ID",
            'creazione' => "Creation date",
            'scadenza' => "Expiration",
            'vai_saluti' => "Go to the greetings page",
            'clicca_qui' => "Click here",
            ],
        'es' =>
        [
            'lingua' => "Idioma actual",
            'cambia' => "Cambiar idioma",
            'sessione_valida' => "Sesión válida",
            'dati_salvati' => "Datos guardados",
            'id_sessione' => "ID de sesión",
            'creazione' => "Fecha de creación",
            'scadenza' => "Vencimiento",
            'vai_saluti' => "Ir a la página de saludos",
            'clicca_qui' => "Haz clic aquí",
        ],
        'de' =>
        [
            'lingua' => "Aktuelle Sprache",
            'cambia' => "Sprache ändern",
            'sessione_valida' => "Gültige Sitzung",
            'dati_salvati' => "Daten gespeichert",
            'id_sessione' => "Sitzungs-ID",
            'creazione' => "Erstellungsdatum",
            'scadenza' => "Ablauf",
            'vai_saluti' => "Zur Grußseite gehen",
            'clicca_qui' => "Hier klicken",
        ],
        'fr' =>
        [
            'lingua' => "Langue actuelle",
            'cambia' => "Changer la langue",
            'sessione_valida' => "Session valide",
            'dati_salvati' => "Données enregistrées",
            'id_sessione' => "ID de session",
            'creazione' => "Date de création",
            'scadenza' => "Expiration",
            'vai_saluti' => "Aller à la page des salutations",
            'clicca_qui' => "Cliquez ici",
        ]
    ];
?>
    <!DOCTYPE html>
<html>
<head>
    <title>Sessions</title>
</head>
<body>
    <h3>Sessioni persistenti (rimangono attive anche dopo la chiusura del browser)</h3>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if (isset($_POST['lang']) && in_array($_POST['lang'], ['it', 'en', 'es', 'de', 'fr']))
            {
                $_SESSION['lang'] = $_POST['lang'];
            }
        }

        $lingua = $_SESSION['lang'] ?? 'it';

        echo $messaggi[$lingua]['id_sessione'] . ": " . session_id() . "<br>";
        echo $messaggi[$lingua]['sessione_valida'] . "<br>";

        echo $messaggi[$lingua]['dati_salvati'] . ":<br>username: " . ($_SESSION['username'] ?? '') . "<br>";

        echo $messaggi[$lingua]['creazione'] . ": ";
        echo date("Y-m-d H:i:s", $_SESSION['time'] ?? time()) . "<br>";

        echo $messaggi[$lingua]['scadenza'] . ": ";
        echo date("Y-m-d H:i:s", $_SESSION['expiration'] ?? time()) . "<br>";
    ?>
    <form method="POST">
    <label><?php echo $messaggi[$lingua]['cambia']; ?>:</label>
    <select name="lang">
        <option value="it" <?php if($lingua==='it') echo 'selected'; ?>>Italiano</option>
        <option value="en" <?php if($lingua==='en') echo 'selected'; ?>>English</option>
        <option value="es" <?php if($lingua==='es') echo 'selected'; ?>>Español</option>
        <option value="de" <?php if($lingua==='de') echo 'selected'; ?>>Deutsch</option>
        <option value="fr" <?php if($lingua==='fr') echo 'selected'; ?>>Français</option>
    </select>
    <button type="submit">OK</button><br>
    <?php echo $messaggi[$lingua]['vai_saluti']?><br>
    <a href="esempio57_7.php"><?php echo $messaggi[$lingua]['clicca_qui']?></a>
</form>
</body>
</html>
