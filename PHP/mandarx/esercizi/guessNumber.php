<?php
/* INDOVINA IL NUMERO - Slide 50, esempio 12_1
    Scrivere uno script PHP che simuli un gioco in cui il computer tenta di indovinare un numero segreto
    scelto casualmente da sé stesso.

    All'inizio del programma:
        1) Genera un numero segreto casuale compreso fra 2 costanti
        2) Imposta il numero massimo di tentativi con una costante.

    Durante ogni tentativo:
        1) Finché non indovina e ci sono tentativi a disposizione, genera una ipotesi casuale.
        2) Se l'ipotesi è corretta, stampa un messaggio di vittoria e termina il ciclo.
        3) Altrimenti da un indizio sulla grandezza del numero segreto rispetto all'ipotesi.
    
    Al termine del gioco
        Mostra un messaggio e un link per ricaricare la pagina e giocare di nuovo.
*/

    define("MAX_VALUE","500");
    define("MIN_VALUE","0");
    define("NUM_TENTATIVI", "10");

    $toGuess = rand(MIN_VALUE, MAX_VALUE); // MIN_VALUE <= x <= MAX_VALUE
    echo "Shh! This is the secret number! $toGuess <br><br>";

    //Setup minimum and maximum so to make it dynamic
    $myGuess_min = MIN_VALUE;
    $myGuess_max = MAX_VALUE;
    $didWin = false;
    for ($i = 0; $i < NUM_TENTATIVI; $i++) {
        //Generate my number
        $myGuess = rand($myGuess_min, $myGuess_max);
        echo "My selected number is $myGuess <br>";

        //Guess my number
        // You guessed correctly -> end game
        if ($toGuess == $myGuess) {
            echo "You guessed correctly my number of the $i th try!<br><br>";
            $didWin = true;
            break;
        }
        
        if ($toGuess < $myGuess) {
            //Surely the magic number is less than my generated number and because of that I can use it as my new maximum, decreasing the range
            echo "Your number is larger than mine! <br>";
            $myGuess_max = $myGuess;
        } else { //must be $magicNumber > $myGuess
            echo "Your number is smaller than mine! <br>";
            $myGuess_min = $myGuess;
        }
        echo "<br>";
    }

    // Message to print at the end of the game
    if ($didWin) {
        echo "You won! Congratulations! Play again?<br> <a href = \"guessNumber.php\"> Try your luck! </a>";
    } else {
        echo "Nooo! You lost. Play again?<br> <a href = \"guessNumber.php\"> Try your luck! </a>";

    }

?>