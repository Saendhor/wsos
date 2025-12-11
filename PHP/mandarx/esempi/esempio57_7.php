<?php 
    session_start();

    if (!isset($_SESSION['username']) || !isset($_SESSION['lang']))
    {
        header("Location: esempio57_5.php");
        exit;
    }

    $lingua = $_SESSION['lang'];
    
    $messaggi =
    [
        'it' =>
        [
            'welcome' => "Bentornato {$_SESSION['username']}, è sempre un piacere rivederti.",
            'back'    => "Torna indietro"
        ],
        'en' =>
        [
            'welcome' => "Welcome back {$_SESSION['username']}, it's always a pleasure to see you.",
            'back'    => "Go back"
        ],
        'es' =>
        [
            'welcome' => "Bienvenido de nuevo {$_SESSION['username']}, siempre es un placer verte.",
            'back'    => "Volver atrás"
        ],
        'de' =>
        [
            'welcome' => "Willkommen zurück {$_SESSION['username']}, es ist immer schön, dich wiederzusehen.",
            'back'    => "Zurück"
        ],
        'fr' =>
        [
            'welcome' => "Bon retour {$_SESSION['username']}, c’est toujours un plaisir de vous revoir.",
            'back'    => "Retour"
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
        echo $messaggi[$lingua]['welcome'] . "<br><br>";
    ?>
    <a href="esempio57_6.php">
        <?php echo $messaggi[$lingua]['back']; ?>
    </a>
</body>
</html>
