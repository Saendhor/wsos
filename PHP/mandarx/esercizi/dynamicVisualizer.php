<?php
    /* SLIDE 75
        Scrivere uno script PHP che personalizzi l’aspetto e il contenuto della pagina in base alle informazioni rilevate dal client.
        1. impostare un colore di sfondo diverso per ciascun browser o engine.
        2. mostrare un’immagine diversa a seconda del sistema operativo rilevato.
        3. visualizzare un messaggio di benvenuto tradotto nella lingua del client (o in inglese se questa non supportata).

        Suggerimenti:
        1. Utilizzare le funzioni getBrowser(), getOS(), getLanguage()
        2. Per il messaggio utilizzare il seguente array:
    */

        $welcomeMessage = [
            'it' => 'Benvenuto nel nostro sito!',
            'en' => 'Welcome to our website!',
            'es' => '¡Bienvenido a nuestro sitio web!',
            'fr' => 'Bienvenue sur notre site web !',
            'de' => 'Willkommen auf unserer Website!'
        ];

        $backgroundColor = [
            'Gecko' => [
                'bg' => '#FFEFD5',
                'text' => '#663300',
            ],

            'WebKit' => [
                'bg' => '#FFFA00',
                'text' => '#666600',
            ]
        ];

        function getBrowser() {
            //Get the informations about the client and check if is null
            $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? "";
            
            //define the available engines
            $engine = [
                'OPR' => 'Blink', // Opera moderno
                'Presto' => 'Presto', // Opera <= v12
                'Blink' => 'Blink', // Chrome, Edge, Brave
                'WebKit' => 'WebKit', // Safari, Chrome
                'Gecko' => 'Gecko', // Firefox, Netscape 
            ];

            //Search through the engines and associate the proper item
            foreach ($engine as $key => $value) {
                if (strpos($userAgent, $key) !== false) {
                    return $value;
                }
            }
            return "ERROR";
        }

        function getLanguage() {
            if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
                return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            }
            //Default
            return "en";
        }

        function getOS() {
            $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? "";

            $listOS = [
                'Mac OS X' => 'macOS',
                'Linux' => 'Linux',
                'Windows NT 10' => 'Windows',
                'Windows NT 11' => 'Windows',
                'iPhone' => 'iOS',
                'iPad' => 'iOS',
                'Android' => 'Android'
            ];
            
            foreach ($listOS as $key => $value) {
                if (strpos($userAgent, $key) !== false) {
                    return $value;
                }
            }
            return "ERROR";
        }

        //Defines browser engine
        $browser = getBrowser() !== "ERROR" ? getBrowser(): "";
        //Defines page language
        $language = getLanguage(); //Defaults to en
        //Defines client OS
        $os = getOS() !== "ERROR" ? getOS() :"";

        //Set the bg and text colors for the page with given browser
        $pageBackgroundColor = $backgroundColor[$browser]['bg'];
        $pageTextColor = $backgroundColor[$browser]['text'];
        //Define welcome message
        $pageMessage = $welcomeMessage[$language];

        //Output the HTML for the page
        echo "<body style = 'background-color: $pageBackgroundColor; color: $pageTextColor'>";
        echo "$pageMessage";
?>