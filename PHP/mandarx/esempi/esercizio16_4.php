<!DOCTYPE html>
<html>
<head>
    <title>Exercise: Dynamic Personalization with css</title>
    <?php
    #firefox about:config general.useragent.override intl.accept_languages

    define("DEBUG", 0);

    $cssEngine =
    [
        'Gecko' => 'gecko.css',
        'WebKit' => 'webkit.css',
        'Trident' => 'trident.css',
        'Presto' => 'presto.css',
        'Blink' => 'blink.css',
        'NN' => 'default.css',
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
    $cssFile = $cssEngine[$browser] ?? $cssByEngine['NN'];
    ?>
    <link rel="stylesheet" href="css/<?php echo $cssFile; ?>">

<body>

<?php
    $os = getOS();
    $lang = getLanguage();

    $messaggio = $messaggi[$lang];
    $immagine = $immaginiOS[$os];

    echo "<body>";
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
