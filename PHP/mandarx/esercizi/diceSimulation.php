<?php
/*  SIMULAZIONE LANCIO DADI CON ISTOGRAMMA - SLIDE 58
    Scrivere uno script PHP che simuli il lancio di un certo numero di dadi a n facce, per un numero prefissato di volte.
    Dopo ogni lancio, o al termine della simulazione, il programma deve mostrare un istogramma testuale
    che rappresenti la frequenza di ciascun risultato ottenuto.
*/

    $diceType = [
        0 => 4,
        1 => 6,
        2 => 8,
        3 => 10,
        4 => 12,
        5 => 100
    ];

    //Computer picks the right dice
    $selectedDice = $diceType[rand(0, count($diceType) -1)];
    echo "The extracted dice is a d$selectedDice<br>";

    //Computer choses how many times to throw the dice
    $rollDice = rand(1, 10);
    echo "Per each dice, we're going to roll it $rollDice times<br>";

    //Computer choses how many instances of roll there are
    $tentatives = rand(10,30);
    echo "This game is going to have $tentatives tentatives<br>";

    //Where the computer is going to store how many times a given value has
    //been rolled
    $minRolls = $selectedDice;
    $maxRolls = $selectedDice * $rollDice;
    $rolls = range($minRolls, $maxRolls);
    echo "Given the previous parameters, our outcome range is from $minRolls to $maxRolls<br><br>";

    for ($i = 0; $i < $tentatives; $i++) {
        //Throw the dice
        for ($j = 0; $j < $rollDice; $j++) {
            $result += rand(1, $selectedDice);
        }
        echo "On tentative $i, we got a value of $result<br>";
        //Update the rolls array to later display the outcomes
        $rolls[$result]++;
        $result = 0;


    }

?>