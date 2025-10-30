<!DOCTYPE html>
<html>
<head>
    <title>Operators</title>
</head>
<body>
    
<?php
    // Operatori aritmetici
    echo "<h3>Operatori aritmetici</h3>";
    $x = 10;
    $y = 3;
    echo "Somma: " . ($x + $y) . "<br>";
    echo "Sottrazione: " . ($x - $y) . "<br>";
    echo "Moltiplicazione: " . ($x * $y) . "<br>";
    echo "Divisione: " . ($x / $y) . "<br>";
    echo "Modulo: " . ($x % $y) . "<br>";
    echo "Potenza: " . ($x ** $y) . "<br>";

    // Operatori di assegnazione
    echo "<h3>Operatori di assegnazione</h3>";
    $a = 5;
    $a += 3; // equivalente a $a = $a + 3
    echo "a += 3 -> $a<br>";
    $a -= 2;
    echo "a -= 2 -> $a<br>";
    $a *= 4;
    echo "a *= 4 -> $a<br>";
    $a /= 2;
    echo "a /= 2 -> $a<br>";
    $a %= 3;
    echo "a %= 3 -> $a<br>";

    // Operatori di confronto
    echo "<h3>Operatori di confronto</h3>";
    $x = 31;
    $y = "5";
    echo "== -> " . (($x == $y) ? "true" : "false") . "<br>";
    echo "=== -> " . (($x === $y) ? "true" : "false") . "<br>";
    echo "!= -> " . (($x != $y) ? "true" : "false") . "<br>";
    echo "<> -> " . (($x <> $y) ? "true" : "false") . "<br>";
    echo "> -> " . (($x > 3) ? "true" : "false") . "<br>";
    echo "< -> " . (($x < 3) ? "true" : "false") . "<br>";
    echo ">= -> " . (($x >= 5) ? "true" : "false") . "<br>";
    echo "<= -> " . (($x <= 5) ? "true" : "false") . "<br>";
    echo "<=> (spaceship) -> " . ($x <=> $y) . "<br>"; // spaceship operator

    // Operatori di incremento/decremento
    echo "<h3>Operatori di incremento/decremento</h3>";
    $x = 5;
    echo "++\$x -> " . (++$x) . "<br>"; // pre-incremento
    echo "\$x++ -> " . ($x++) . " (dopo: $x)<br>"; // post-incremento
    echo "--\$x -> " . (--$x) . "<br>"; // pre-decremento
    echo "\$x-- -> " . ($x--) . " (dopo: $x)<br>"; // post-decremento

    // Operatori logici
    echo "<h3>Operatori logici</h3>";
    $a = true;
    $b = false;
    echo "and -> " . (($a and $b) ? "true" : "false") . "<br>";
    echo "or -> " . (($a or $b) ? "true" : "false") . "<br>";
    echo "xor -> " . (($a xor $b) ? "true" : "false") . "<br>";
    echo "&& -> " . (($a && $b) ? "true" : "false") . "<br>";
    echo "|| -> " . (($a || $b) ? "true" : "false") . "<br>";
    echo "! -> " . ((!$a) ? "true" : "false") . "<br>";

    // Operatori per stringhe
    echo "<h3>Operatori per stringhe</h3>";
    $txt1 = "Hello";
    $txt2 = " World";
    $txt3 = $txt1 . $txt2; // concatenazione
    echo ". -> " . $txt3 . "<br>";
    $txt1 .= $txt2; // concatenazione con assegnazione
    echo ".= -> " . $txt1 . "<br>";

    // Operatori per array
    echo "<h3>Operatori per array</h3>";
    $x = ["a" => "rosso", "b" => "verde"];
    $y = ["c" => "blu", "d" => "giallo"];
    $z = $x + $y; // unione
    echo "+ -> ";
    print_r($z);
    echo "<br>";

    $x = ["a" => "1", "b" => "verde"];
    $y = ["a" => 1, "b" => "verde"];
    echo "== -> " . (($x == $y) ? "true" : "false") . "<br>";
    echo "=== -> " . (($x === $y) ? "true" : "false") . "<br>";
    echo "!= -> " . (($x != $y) ? "true" : "false") . "<br>";
    echo "<> -> " . (($x <> $y) ? "true" : "false") . "<br>";
    echo "!== -> " . (($x !== $y) ? "true" : "false") . "<br>";

    // Operatori condizionali
    echo "<h3>Operatori condizionali</h3>";
    $age = 20;
    $msg = ($age >= 18) ? "Maggiorenne" : "Minorenne"; // operatore ternario
    echo "?: -> " . $msg . "<br>";

    $name = 0;
    unset($name);
    $result = $name ?? "Anonimo"; // null coalescence
    echo "?? -> " . $result . "<br>";
?>

</body>
</html>
