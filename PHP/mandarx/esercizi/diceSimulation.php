<?php
/*  SIMULAZIONE LANCIO DADI CON ISTOGRAMMA - SLIDE 58
    Scrivere uno script PHP che simuli il lancio di un certo numero di dadi a n facce, per un numero prefissato di volte.
    Dopo ogni lancio, o al termine della simulazione, il programma deve mostrare un istogramma testuale
    che rappresenti la frequenza di ciascun risultato ottenuto.
*/
    define("DEBUG", false);

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
    $rollDice = rand(1, 3);
    echo "Per each dice, we're going to roll it $rollDice times<br>";

    //Computer choses how many instances of roll there are
    $tentatives = rand(10,30);
    echo "This game is going to have $tentatives tentatives<br>";

    $minValue = $rollDice * 1;
    $maxValue = $rollDice * $selectedDice;
    echo "With the given parameters, our range is going to be between $minValue and $maxValue<br><br>";
    
    $values[$maxValue];
    for ($i = 0; $i < $maxValue; $i++) {
        $values[$i] = 0;
        if (DEBUG) {
            echo "$i, $values[$i]<br>";
        }
    }
    //Throwing the dice
    for ($t = 0; $t < $tentatives; $t++) {
        //Variable storing the result of the thrown dices
        $result = 0;
        for ($r = 0; $r < $rollDice; $r++) {
            $result += rand(1, $selectedDice);
        }
        echo "Result for tentative $t is $result<br>";
        $values[$result - 1]++; // $result - 1 because the array starts at 0
    }

    if (DEBUG) {
        echo "<br>";
        for ($i = 0; $i < $maxValue; $i++) {
            $slot = $i + 1;
            echo "$slot: $values[$i]<br>";
        }
    }

    for ($s = 0; $s < $maxValue; $s++) {
        $slotToPrint = $s + 1;
        echo "$slotToPrint: ";
        while ($values[$s] > 0) {
            echo "*";
            //Decrements the occurrence of the already printed item
            $values[$s]--;
        }
        echo "<br>";
    }
?>