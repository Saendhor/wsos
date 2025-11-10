<?php

    /* SLIDE 59
        Scrivere uno script PHP che generi automaticamente brevi poesie composte da versi creati casualmente.
        1. Definire una costante NUMERO_VERSI che indica quanti versi generare.
        2. Definire quattro array $soggetti, $verbi, $oggetti, $chiusure contenenti parole o frasi appartenenti alle diverse categorie
        3. Estrarre casualmente un elemento da ciascuno dei primi tre array usando una funzione.
        4. Costruire una frase unendo gli elementi.
        5. Con una probabilità del 50%, aggiungere una chiusura tratta dall’array $chiusure.
        6. Restituire la stringa finale con un punto.
        7. Stampare un link che permetta di generare un nuovo poema.
    */

    define("DEBUG", true);
    define("NUMBER_OF_VERSES", 4);
    $subject = [
        0 => "Alice",
        1 => "Corrado",
        2 => "Tony"
    ];
    
    $verb = [
        0 => "Studia",
        1 => "Salta",
        2 => "Corre"
    ];

    $object = [
        0 => "Palla",
        1 => "Motosega",
        2 => "Palo"
    ];

    $closing = [
        0 => "Bro",
        1 => "Damn",
        2 => "Sksk"
    ];

    $stringToGenerate = $subject[rand(0, count($subject) - 1)] . " " .
                        $verb[rand(0, count($verb) - 1)] . " " .
                        $object[rand(0, count($object) - 1)];
    
    //Check wheather a verse should have closing line or not
    $closingChance = rand(0, 1);
    if ($closingChance > 0) {
        //if YES then append
        $stringToGenerate . $closing[rand(0, count($closing) - 1)];
    }

    echo "$stringToGenerate.<br>";
    echo '<a href = "poetrySimulator.php"> Generate new sentence!</a>';

?>