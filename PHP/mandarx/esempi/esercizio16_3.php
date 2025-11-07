<!DOCTYPE html>
<html>
<head>
<?php
    #firefox about:config general.useragent.override intl.accept_languages

    define("DEBUG", 0);

    $coloriEngine =
    [
        'Gecko' => ['bg' => '#FFEFD5', 'text' => '#663300'],
        'WebKit' => ['bg' => '#FFFACD', 'text' => '#666600'],
        'Trident' => ['bg' => '#000000', 'text' => '#FF0000'],
        'Presto' => ['bg' => '#FFE4E1', 'text' => '#660000'],
        'Blink' => ['bg' => '#52b8e8ff', 'text' => '#c924d8ff'],
        'NN' => ['bg' => '#FFFFFF', 'text' => '#000000'],
    ];

    $immaginiOS =
    [
        'macOS' => 'ma.png',
        'Linux' => 'li.png',
        'Windows' => 'wi.png',
        'iOS' => 'io.png',
        'Android' => 'an.png',
        'NN' => 'nn.png',
    ];

    // messaggi di benvenuto in base alla lingua
    $messaggi =
    [
        'it' => 'Benvenuto nel nostro sito!',
        'en' => 'Welcome to our website!',
        'es' => '¡Bienvenido a nuestro sitio web!',
        'fr' => 'Bienvenue sur notre site web !',
        'de' => 'Willkommen auf unserer Website!',
    ];

    function getEngine()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? "";

        // mappa dei principali motori di rendering
        $engines =
            [
            'OPR' => 'Blink', // Opera moderno
            'Presto' => 'Presto', // Opera <= v12

            'Blink' => 'Blink', // Chrome, Edge, Brave
            'WebKit' => 'WebKit', // Safari, iOS WebView

            'EdgeHTML' => 'Trident', // vecchio Edge
            'Trident' => 'Trident', // Internet Explorer

            'Gecko' => 'Gecko', // Firefox, Netscape
        ];

        foreach ($engines as $key => $value)
        {
            if (stripos($userAgent, $key) !== false)
            {
                return $value;
            }
        }

        return "NN";
    }

    function getOS()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? "";

        $osMap =
            [
            'Mac OS X' => 'macOS',
            'Linux' => 'Linux',
            'Windows NT 10' => 'Windows',
            'Windows NT 11' => 'Windows',
            'iPhone' => 'iOS',
            'iPad' => 'iOS',
            'Android' => 'Android',
        ];

        foreach ($osMap as $key => $value)
        {
            if (stripos($userAgent, $key) !== false)
            {
                return $value;
            }
        }
        return 'NN';
    }

    function getLanguage()
    {
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
        {
            return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        }
        return 'en';
    }

    $browser = getEngine();
    $os = getOS();
    $lang = getLanguage();

    $coloreSfondo = $coloriEngine[$browser]['bg'];
    $coloreTesto = $coloriEngine[$browser]['text'];
?>
    <title>Exercise: Dynamic Personalization</title>
    <style>
        body
        {
            background-color: <?= $coloreSfondo ?>;
            color: <?= $coloreTesto ?>;
            text-align: center;
            font-family: Arial, sans-serif;
        }
    </style>

</head>
<body>

<?php
    $messaggio = $messaggi[$lang];
    $immagine = $immaginiOS[$os];

    echo "<body>\n";
    echo "<h2>$messaggio</h2>";
    echo "<img src='imgs/$immagine' alt='$os' style='width:150px; margin-top:20px;'><br>";
    echo "<img src='imgs/$lang.jpg' alt='$lang' style='margin-top:20px;'><br>";
    

    if (DEBUG === 1)
    {
        echo $browser . "<br>";
        echo $os . "<br>";
        echo $lang . "<br>";
    }

    echo "</body>";
?>

</body>
</html>
