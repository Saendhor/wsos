<!DOCTYPE html>
<html>
<head>
    <title>Array - Counting, Calculations and Other Utilities</title>
</head>
<body>

<?php
    // CONTEGGIO E CALCOLI
    echo "<h2>Conteggio e calcoli</h2>";

    // count() / sizeof()
    echo "<h3>count() / sizeof()</h3>";
    $detective = ["Sherlock Holmes", "John Watson", "Moriarty"];
    echo "Prima:<br>";
    print_r($detective);
    echo "<br><br>";
    echo "Numero di elementi con count(): " . count($detective) . "<br>";
    echo "Numero di elementi con sizeof(): " . sizeof($detective) . "<br><br>";

    // array_sum()
    echo "<h3>array_sum()</h3>";
    $numeri = [10, 20, 30];
    echo "Prima:<br>";
    print_r($numeri);
    echo "<br><br>";
    echo "Dopo array_sum(): somma = " . array_sum($numeri) . "<br><br>";

    // array_product()
    echo "<h3>array_product()</h3>";
    $numeri = [2, 3, 4];
    echo "Prima:<br>";
    print_r($numeri);
    echo "<br><br>";
    echo "Dopo array_product(): prodotto = " . array_product($numeri) . "<br><br>";

    // array_count_values()
    echo "<h3>array_count_values()</h3>";
    $indizi = ["pipa", "pistola", "pipa", "lama", "lama", "lama", "pantofola"];
    echo "Prima:<br>";
    print_r($indizi);
    echo "<br><br>";
    $conteggio = array_count_values($indizi);
    echo "Dopo array_count_values() (conteggio delle occorrenze):<br>";
    print_r($conteggio);
    echo "<br><br>";


    // ALTRE UTILITÀ
    echo "<h2>Altre utilità</h2>";

    // array_reverse()
    echo "<h3>array_reverse()</h3>";
    $tappe = ["Baker Street", "Scotland Yard", "Tower Bridge"];
    echo "Prima:<br>";
    print_r($tappe);
    echo "<br><br>";
    $invertito = array_reverse($tappe);
    echo "Dopo array_reverse():<br>";
    print_r($invertito);
    echo "<br><br>";

    // array_flip()
    echo "<h3>array_flip()</h3>";
    $detective = ["nome" => "Sherlock Holmes", "città" => "Londra"];
    echo "Prima:<br>";
    print_r($detective);
    echo "<br><br>";
    $invertito = array_flip($detective);
    echo "Dopo array_flip() (chiavi e valori scambiati):<br>";
    print_r($invertito);
    echo "<br><br>";

    // array_rand()
    echo "<h3>array_rand()</h3>";
    $armi = ["pistola", "corda", "candeliere", "lama", "chiave inglese"];
    echo "Prima:<br>";
    print_r($armi);
    echo "<br><br>";
    $casuale = array_rand($armi, 2);
    echo "Dopo array_rand() (due chiavi casuali):<br>";
    print_r($casuale);
    echo "<br>Elementi estratti:<br>";
    echo $armi[$casuale[0]] . ", " . $armi[$casuale[1]];
    echo "<br><br>";

    // list()
    echo "<h3>list()</h3>";
    $coord = [51.5074, -0.1278]; // coordinate di Londra
    echo "Prima:<br>";
    print_r($coord);
    echo "<br><br>";
    list($lat, $lon) = $coord;
    echo "Dopo list():<br>";
    echo "Latitudine = $lat, Longitudine = $lon<br><br>";

    // extract()
    echo "<h3>extract()</h3>";
    $profilo = ["nome" => "Sherlock Holmes", "città" => "Londra", "id" => 325];
    echo "Prima:<br>";
    print_r($profilo);
    echo "<br><br>";
    extract($profilo); // crea variabili $nome, $città, $id
    echo "Dopo extract():<br>";
    echo "\$nome = $nome, \$città = $città, \$id = $id<br><br>";
?>

</body>
</html>
