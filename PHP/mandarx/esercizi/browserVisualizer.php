<?php
    /*  SLIDE 74
        Scrivere uno script che analizzi le informazioni inviate dal client e visualizzi a schermo:
            1. Il nome del browser utilizzato.
            2. Il sistema operativo rilevato.
            3. La lingua principale impostata nel browser.
    */
    define("DEBUG", true);
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

    if (strpos($user_agent,"Linux")) {
        $browser = "Linux";
        
    } else if (strpos($user_agent,"Windows")) {
        $browser = "Windows";

    } else if (strpos($user_agent,"MacOS")) {
        $browser = "MacOS";

    } else {
        $browser = "ERROR retrieving user agent";
    }

    echo "$browser<br>";
    echo substr($language, 0, 2) . "<br>";
?>