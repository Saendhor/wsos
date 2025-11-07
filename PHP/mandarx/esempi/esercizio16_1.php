<!DOCTYPE html>
<html>
<head>
    <title>Exercise: Superglobals</title>    
</head>
<body>

<?php
    #firefox about:config general.useragent.override intl.accept_languages

    // usare !== false è più accurato perché stripos() restituisce la posizione o false
    // usando "!== false" distinguiamo 0 (inizio stringa) da falso

    // determinare il browser
    function getBrowser()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? "";

        if (stripos($userAgent, 'OPR') !== false || stripos($userAgent, 'Opera') !== false)
        {
            return 'Opera';
        }
        elseif (stripos($userAgent, 'Edg') !== false)
        {
            return 'Microsoft Edge';
        }
        elseif (stripos($userAgent, 'Firefox') !== false)
        {
            return 'Mozilla Firefox';
        }
        elseif (stripos($userAgent, 'Chrome') !== false && stripos($userAgent, 'Chromium') === false)
        {
            return 'Google Chrome';
        }
        elseif (stripos($userAgent, 'Safari') !== false && stripos($userAgent, 'Chrome') === false)
        {
            return 'Apple Safari';
        }
        elseif (stripos($userAgent, 'Trident') !== false || stripos($userAgent, 'MSIE') !== false)
        {
            return 'Internet Explorer';
        }

        return "Browser sconosciuto ($userAgent)";
    }


    // determinare il browser (versione piu facile da mantenere)
    function getBrowser2()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? "";

        // mappa dei nomi dei principali browser
        $browsers =
        [
            'Firefox' => 'Mozilla Firefox',
            'Edge' => 'Microsoft Edge',
            'OPR' => 'Opera',
            'Opera' => 'Opera',
            'Chrome' => 'Google Chrome',
            'Safari' => 'Apple Safari',
            'Trident' => 'Internet Explorer',
            'MSIE' => 'Internet Explorer',
        ];

        foreach ($browsers as $key => $value)
        {
            if (stripos($userAgent, $key) !== false)
            {
                return $value;
            }
        }

        return "Browser sconosciuto ($userAgent)";
    }

    // determinare il sistema operativo
    function getOS()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        if (stripos($userAgent, 'Mac OS X') !== false)
        {
            return 'macOS';
        }
        elseif (stripos($userAgent, 'Linux') !== false)
        {
            return 'Linux';
        }
        elseif (stripos($userAgent, 'Windows NT 10') !== false)
        {
            return 'Windows 10';
        }
        elseif (stripos($userAgent, 'Windows NT 11') !== false)
        {
            return 'Windows 11';
        }
        elseif (stripos($userAgent, 'iPhone') !== false || stripos($userAgent, 'iPad') !== false)
        {
            return 'iOS';
        }
        elseif (stripos($userAgent, 'Android') !== false)
        {
            return 'Android';
        }
        else
        {
            return 'Sistema operativo sconosciuto';
        }
    }


    // determinare il sistema operativo (versione piu facile da mantenere)
    function getOS2()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? "";

        // Mappa dei sistemi operativi e relative parole chiave
        $osMap =
        [
            'Mac OS X' => 'macOS',
            'Linux' => 'Linux',
            'Windows NT 10' => 'Windows 10',
            'Windows NT 11' => 'Windows 11',
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
        return 'Sistema operativo sconosciuto';
    }


    // determinare la lingua principale del browser
    function getLanguage()
    {
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
        {
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            switch ($lang)
            {
                case 'it':
                    return 'Italiano';

                case 'en':
                    return 'Inglese';

                case 'fr':
                    return 'Francese';

                case 'de':
                    return 'Tedesco';

                case 'es':
                    return 'Spagnolo';

                default:
                    return 'Lingua non riconosciuta';
            }
        }
    }

    // Esempio d’uso:
    echo "Browser: " . getBrowser() . "<br>";
    echo "Browser: " . getBrowser2() . "<br>";
    echo "Sistema operativo: " . getOS() . "<br>";
    echo "Sistema operativo: " . getOS2() . "<br>";
    echo "Lingua: " . getLanguage() . "<br>";
?>

</body>
</html>
