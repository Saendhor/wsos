<!DOCTYPE html>
<html>
<head>
    <title>Strings</title>
</head>
<body>

<?php
    // Stampa stringhe tra doppi e singoli apici
    echo "Hello";
    echo "<br>";
    echo 'Hello';
    echo "<br><br>\n";

    // Differenza tra doppi e singoli apici: i doppi interpretano le variabili
    $x = "John";
    echo "Hello $x";
    echo "<br><br>\n";

    $x = "John Doe";
    echo 'Hello $x';
    echo "<br><br>\n";

    // Lunghezza della stringa
    echo 'strlen:("Hello world!"): ';    
    echo strlen("Hello world!");
    echo "<br><br>";

    // Conta il numero di parole
    echo 'str_word_count:("Hello world!"): ';
    echo str_word_count("Hello world!");
    echo "<br><br>";

    // Trova la posizione di una parola nella stringa
    echo 'strpos:("Hello world!", "world"): ';
    echo strpos("Hello world!", "world");
    echo "<br><br>";

    // Trova la posizione ignorando maiuscole/minuscole
    echo 'stripos("Hello world!", "WORLD"): ';
    echo stripos("Hello world!", "WORLD");
    echo "<br><br>";


    // Converte tutto in maiuscolo
    echo 'strtoupper:("Hello world!"): ';
    echo strtoupper("Hello World!");
    echo "<br><br>";    

    // Converte tutto in minuscolo
    echo 'strtolower:("Hello world!"): ';
    echo strtolower("Hello World!");
    echo "<br><br>";

    // Sostituisce una parte del testo
    echo 'str_replace("World", "Dolly", "Hello world!"): ';
    $x = "Hello World!";
    echo str_replace("World", "Dolly", $x);    
    echo "<br><br>";

    // Inverte la stringa
    echo 'strrev("Hello world!"): ';
    echo strrev("Hello world!");
    echo "<br><br>";

    // Rimuove gli spazi iniziali e finali
    echo 'trim(" Hello world! "): ';
    echo trim(" Hello world! ");
    echo "<br><br>";
    
    // Divide la stringa in un array
    echo 'explode(" ", "Hello World!"): ';
    $a = explode(" ", "Hello World!");
    print_r($a); // Mostra il contenuto dell’array
    echo "<br><br>"; 
    

    // Variabili tra doppi apici1
    echo 'echo "$x $y": ';
    $x = "Hello";
    $y = "World";
    echo "$x $y";
    echo "<br><br>";

    // Variabili tra doppi apici2
    echo '//dato $z="$x $y"';
    echo "<br>";
    echo 'echo $z: ';
    $x = "Hello";
    $y = "World";
    $z = "$x $y";
    $t = $x . " " . $y;
    echo "$z";
    echo "<br><br>";
    echo "$t";
    echo "<br><br>";


    // Concatenazione di stringhe
    echo '//dato $z = $x . " " . $y';
    $x = "Hello";
    $y = "World";
    $z = $x . " " . $y;
    echo 'echo $z: ';
    echo $z;
    echo "<br><br>";

    // Estrae una sottostringa (dal carattere 6 per 5 caratteri)
    echo 'substr("Hello World!", 6, 5): ';
    echo substr("Hello World!", 6, 5);
    echo "<br><br>";
 
    // Estrae dal carattere 6 fino alla fine
    echo 'echo substr($x, 6): ';
    echo substr("Hello World!", 6);
    echo "<br><br>";
    

    // Estrae 3 caratteri a partire da 5 caratteri dalla fine
    echo 'substr("Hello World!", -5, 3): ';
    echo substr("Hello World!", -5, 3);
    echo "<br><br>";

    

    // Estrae dal carattere 5 fino a 3 caratteri prima della fine
    echo 'substr("Hi, how are you?", 5, -3): ';
    echo substr("Hi, how are you?", 5, -3);
    echo "<br><br>";

    // Utilizzo del carattere di escape per includere virgolette


    $x = "We are the so-called \"Vikings\" from the north.";
    echo $x;
    echo "<br>"; 

    $v = "\"Vikings\"";
    $x = "We are the so-called $v from the north.";
    echo $x;
    echo "<br>"; 

    $x = 'We are the so-called "Vikings" from the north.';
    echo $x;
    echo "<br>";

?>

</body>
</html>
