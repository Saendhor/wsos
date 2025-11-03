<!DOCTYPE html>
<html>
<head>
    <title>Exercise: Regex</title>
</head>
<body>

<?php
    $emails =
    [
        // validi
        "sherlock.holmes@detective.co.uk",
        "holmes123@detective.com",
        "john_watson@medical-center.org",
        "my.email-test@domain.info",
        "test@localhost.co",

        // non validi
        "sherlock.holmes@detective.c",        // estensione troppo corta
        "holmes@@detective.co.uk",            // doppia chiocciola
        ".holmes@detective.co.uk",            // inizia con punto
        "holmes.@detective.co.uk",            // finisce con punto prima di @
        "@detective.co.uk",                   // manca parte utente
        "holmes@.co.uk",                      // dominio inizia con punto
        "holmes@detective",                   // manca estensione
        "prova",                              // nessuna @
        "a@b.c",                              // estensione troppo corta
        "no spaces@allowed.com",              // contiene spazio
        "invalid-char!@domain.com",           // contiene caratteri non ammessi
    ];
    
    $pattern = "/^[a-zA-Z0-9](?:[a-zA-Z0-9._-]*[a-zA-Z0-9])?@[a-zA-Z0-9](?:[a-zA-Z0-9.-]*[a-zA-Z0-9])?\.[a-zA-Z]{2,}$/";

    foreach ($emails as $email)
    {
        echo "L'indirizzo email '<b>$email</b>' ";

        if (preg_match($pattern, $email))
        {
            echo "è <span style='color:green;'>valido</span>.<br>";
        }
        else
        {
            echo "è <span style='color:red;'>non valido</span>.<br>";
        }
    }

    /*
    "/^[a-zA-Z0-9](?:[a-zA-Z0-9._-]*[a-zA-Z0-9])?@[a-zA-Z0-9](?:[a-zA-Z0-9.-]*[a-zA-Z0-9])?\.[a-zA-Z]{2,}$/";

    /  delimitatore del pattern.
    ^  indica l’inizio della stringa.

    [a-zA-Z0-9]  il nome utente deve iniziare con una lettera o un numero (non con un punto o simbolo).

    (?:[a-zA-Z0-9._-]*[a-zA-Z0-9])?  gruppo che consente caratteri intermedi (. _ -),
                                     ma richiede che il nome utente termini con una lettera o un numero.

    @ chiocciola obbligatoria, una sola.

    [a-zA-Z0-9]  il dominio deve iniziare con una lettera o un numero (non con un punto).

    (?:[a-zA-Z0-9.-]*[a-zA-Z0-9])?  gruppo che consente punti o trattini interni,
                                    ma impone che il dominio termini con una lettera o un numero.

    \.  punto letterale prima dell’estensione.

    [a-zA-Z]{2,}  estensione composta da almeno due lettere (es. it, com, info).

    $  fine della stringa (non deve esserci altro dopo l’estensione).
*/

?>

</body>
</html>
