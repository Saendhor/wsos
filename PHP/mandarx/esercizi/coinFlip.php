<?php
/*
    Scrivi un programma PHP che simuli il lancio ripetuto di una moneta.
    1. Definire le costanti NUMERO_LANCI per stabilire quanti lanci eseguire e
        STAMPA_PASSI per decidere se mostrare ogni singolo lancio (1 = sì, 0 = no).
    2. Usare un ciclo for per eseguire i lanci e generare casualmente un risultato (0 o 1).
    3. Contare quante volte esce testa e quante croce e stampare ogni lancio se STAMPA_PASSI == 1
    4. Al termine, stampare un riepilogo visivo con una riga di asterischi per ciascun tipo di risultato.
*/
    define("NUM_FLIPS","10");
    define("PRINT_STEPS", true); //Change it in the code

    //define the structure that will contain the esits;
    $result = [
        "head" => 0,
        "cross" => 0
    ];

    for ($i = 0; $i < NUM_FLIPS; $i++) {
        //Flip of the coin
        $coinFlip = rand(0,1);
        //Print the result of the throw
        if ($coinFlip) {
            echo "Coin Flip is head for iteration $i <br>";
        } else {
            echo "Coin Flip is cross for iteration $i <br>";
        }
        //update the results array
        $coinFlip == 1 ? $result["head"]++ : $result["cross"]++;
        if (PRINT_STEPS) {
            echo "currently flipped heads: " . $result["head"] . "<br>";
            echo "currently flipped crosses: " . $result["cross"] . "<br>";
        }
        echo "<br><br>";
    }
    echo "<br><br>";

    //print the number of heads
    echo "head: ";
    for ($i = 0; $i < $result["head"]; $i++) {
        echo "*";
    } echo "<br>";

    //print the number of crosses
    echo "cross: ";
    for ($i = 0; $i < $result["cross"]; $i++) {
        echo "*";
    } echo "<br>";


?>