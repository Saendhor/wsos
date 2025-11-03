<!DOCTYPE html>
<html>
<head>
    <title>Regex</title>
</head>
<body>

<?php
    // uso di preg_match()
    echo "<h3>preg_match()</h3>";
    $str = "Visita W3Schools";
    echo "Stringa originale: $str<br><br>";
    $pattern = "/w3schools/i"; // "/" è un delimitatore tra il pattern e i modificatori (qui 'i' per ignorare maiuscole/minuscole)
    echo "Pattern: $pattern<br><br>";
    echo "Cerca la parola 'w3schools' ignorando maiuscole e minuscole.<br><br>";
    echo "Risultato di <b>preg_match</b>(\"<i>$pattern</i>\", \"<i>$str</i>\"): " . preg_match_all($pattern, $str) . "<br>";

    // uso di preg_match_all()
    echo "<h3>preg_match_all()</h3>";
    $str = "The rain in SPAIN falls mainly on the plains.";
    echo "Stringa originale: $str<br><br>";
    $pattern = "/ain/i"; // "/" è un delimitatore tra il pattern e i modificatori (qui 'i' per ignorare maiuscole/minuscole)
    echo "Pattern: $pattern<br><br>";
    echo "Trova tutte le occorrenze della sequenza 'ain', ignorando maiuscole/minuscole.<br><br>";
    echo "Risultato di <b>preg_match_all</b>(\"<i>$pattern</i>\", \"<i>$str</i>\"): " . preg_match_all($pattern, $str) . "<br>";
    echo "Risultato di <b>preg_match_all</b>(\"<i>$pattern</i>\", \"<i>$str</i>\", \$matches): ";
    preg_match_all($pattern, $str, $matches);
    echo implode(", ", $matches[0]) . "<br><br>";
    /* 
    preg_match_all() salva i risultati in un array multidimensionale:
        $matches[0] contiene le corrispondenze complete
        $matches[1], $matches[2], contengono i gruppi catturati
    */

    // uso di preg_replace()
    echo "<h3>preg_replace()</h3>";
    $str = "Visita Microsoft!";
    echo "Stringa originale: $str<br><br>";
    $pattern = "/microsoft/i"; // "/" delimita il pattern, 'i' rende la ricerca case-insensitive
    echo "Sostituisce 'Microsoft' con 'W3Schools'.<br><br>";
    echo "Pattern: $pattern<br><br>";
    echo "Risultato di <b>preg_replace</b>(\"<i>$pattern</i>\", \"W3Schools\", \"<i>$str</i>\"): " . preg_replace($pattern, "W3Schools", $str) . "<br>";


    // esempio con raggruppamento
    echo "<h3>Raggruppamento</h3>"; 
    $str = "Apples, bananas and ananas.";
    echo "Stringa originale: $str<br><br>"; 
    $pattern = "/ba(na){2}/i"; 
    //$pattern = "/a(na){2}/i"; 
    echo "Pattern: $pattern<br><br>";
    echo "Cerca 'ba' seguito da due ripetizioni di 'na' (cioè 'banana').<br><br>";
    echo "Risultato di <b>preg_match(\"<i>$pattern</i>\", \"<i>$str</i>\")</b>: " . preg_match($pattern, $str) . "<br>";
    echo "Risultato di <b>preg_match(\"<i>$pattern</i>\", \"<i>$str</i>\", \$matches)</b>: ";
    preg_match_all($pattern, $str, $matches);
    echo implode(", ", $matches[0]) . "<br><br>";

    // esempi con classi di caratteri
    // [abc] significa uno dei caratteri tra le parentesi
    echo "<h3>[abc]</h3>";
    $str = "cat bat rat fat hat mat pat sat chat flat that";
    echo "Stringa originale: $str<br><br>";
    $pattern = "/[cbp]at/";
    //$pattern = "/[cbph]at/";
    //$pattern = "/\b[cbph]at/";
    echo "Pattern: $pattern<br><br>";
    echo "Trova parole che iniziano con 'c', 'b' o 'p' e finiscono con 'at'.<br><br>";
    echo "Risultato di <b>preg_match_all(\"<i>$pattern</i>\", \"<i>$str</i>\")</b>: " . preg_match_all($pattern, $str) . "<br>";
    echo "Risultato di <b>preg_match_all(\"<i>$pattern</i>\", \"<i>$str</i>\", \$matches)</b>: ";
    preg_match_all($pattern, $str, $matches);
    echo implode(", ", $matches[0]) . "<br><br>";


    // esclusione
    // [^abc] significa qualsiasi carattere tranne quelli tra parentesi
    echo "<h3>[^abc]</h3>";
    $str = "apple banana cherry";
    echo "Stringa originale: $str<br><br>";
    $pattern = "/[^abc]/";
    echo "Pattern: $pattern<br><br>";
    echo "Trova qualsiasi carattere che NON sia 'a', 'b' o 'c'.<br><br>";
    echo "Risultato di <b>preg_match_all(\"<i>$pattern</i>\", \"<i>$str</i>\")</b>: " . preg_match_all($pattern, $str) . "<br>";
    echo "Risultato di <b>preg_match_all(\"<i>$pattern</i>\", \"<i>$str</i>\", \$matches)</b>: ";
    preg_match_all($pattern, $str, $matches);
    echo implode(", ", $matches[0]) . "<br><br>";

    // range
    // [a-z] significa lettera minuscola da a a z
    echo "<h3>[a-z]</h3>";
    $str = "PHP version 8";
    echo "Stringa originale: $str<br><br>";
    $pattern = "/[a-z]/";
    echo "Pattern: $pattern<br><br>";
    echo "Trova tutte le lettere minuscole da 'a' a 'z'.<br><br>";
    echo "Risultato di <b>preg_match_all(\"<i>$pattern</i>\", \"<i>$str</i>\")</b>: " . preg_match_all($pattern, $str) . "<br>";
    echo "Risultato di <b>preg_match_all(\"<i>$pattern</i>\", \"<i>$str</i>\", \$matches)</b>: ";
    preg_match_all($pattern, $str, $matches);
    echo implode(", ", $matches[0]) . "<br><br>";
 

    // [0-9] significa cifra da 0 a 9
    echo "<h3>[0-9]</h3>";
    $str = "User ID: 12345";
    echo "Stringa originale: $str<br><br>";
    $pattern = "/[0-9]/";
    echo "Trova tutte le cifre da 0 a 9 presenti nella stringa.<br><br>";
    echo "Pattern: $pattern<br><br>";
    echo "Risultato di <b>preg_match_all(\"<i>$pattern</i>\", \"<i>$str</i>\")</b>: " . preg_match_all($pattern, $str) . "<br>";
    echo "Risultato di <b>preg_match_all(\"<i>$pattern</i>\", \"<i>$str</i>\", \$matches)</b>: ";
    preg_match_all($pattern, $str, $matches);
    echo implode(", ", $matches[0]) . "<br><br>";
?>

</body>
</html>
