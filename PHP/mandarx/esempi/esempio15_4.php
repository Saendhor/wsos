<!DOCTYPE html>
<html>
<head>
    <title>Array - Comparison, Differences and Element Manipulation</title>
</head>
<body>

<?php
    // CONFRONTO E DIFFERENZE
    echo "<h2>Confronto e differenze</h2>";

    // array_diff()
    echo "<h3>array_diff()</h3>";
    $a1 = ["Londra", "Parigi", "Roma"];
    $a2 = ["Parigi", "Madrid"];
    echo "Prima:<br>";
    echo "\$a1 = ";
    print_r($a1);
    echo "<br>\$a2 = ";
    print_r($a2);
    echo "<br><br>";
    $diff = array_diff($a1, $a2);
    echo "Dopo array_diff() (elementi in \$a1 ma non in \$a2):<br>";
    print_r($diff);
    echo "<br><br>";

    // array_diff_assoc()
    echo "<h3>array_diff_assoc()</h3>";
    $a1 = ["id" => 325, "nome" => "Sherlock Holmes", "città" => "Londra"];
    $a2 = ["id" => 325, "nome" => "John Watson", "città" => "Londra"];
    echo "Prima:<br>";
    print_r($a1);
    echo "<br>";
    print_r($a2);
    echo "<br><br>";
    $diffAssoc = array_diff_assoc($a1, $a2);
    echo "Dopo array_diff_assoc() (differenze chiave+valore):<br>";
    print_r($diffAssoc);
    echo "<br><br>";

    // array_diff_key()
    echo "<h3>array_diff_key()</h3>";
    $a1 = ["nome" => "Sherlock Holmes", "città" => "Londra", "id" => 325];
    $a2 = ["nome" => "Sherlock Holmes", "città" => "Londra"];
    echo "Prima:<br>";
    print_r($a1);
    echo "<br>";
    print_r($a2);
    echo "<br><br>";
    $diffKey = array_diff_key($a1, $a2);
    echo "Dopo array_diff_key() (chiavi presenti solo nel primo array):<br>";
    print_r($diffKey);
    echo "<br><br>";

    // array_intersect()
    echo "<h3>array_intersect()</h3>";
    $a1 = ["Londra", "Lisbona", "Lubiana"];
    $a2 = ["Lisbona", "Londra", "Barcellona"];
    echo "Prima:<br>";
    print_r($a1);
    echo "<br>";
    print_r($a2);
    echo "<br><br>";
    $intersect = array_intersect($a1, $a2);
    echo "Dopo array_intersect() (elementi comuni):<br>";
    print_r($intersect);
    echo "<br><br>";

    // array_intersect_assoc()
    echo "<h3>array_intersect_assoc()</h3>";
    $a1 = ["id" => 325, "nome" => "Sherlock Holmes", "città" => "Londra"];
    $a2 = ["id" => 325, "nome" => "John Watson", "città" => "Londra"];
    echo "Prima:<br>";
    print_r($a1);
    echo "<br>";
    print_r($a2);
    echo "<br><br>";
    $interAssoc = array_intersect_assoc($a1, $a2);
    echo "Dopo array_intersect_assoc() (elementi identici chiave+valore):<br>";
    print_r($interAssoc);
    echo "<br><br>";

    // array_intersect_key() Restituisce gli elementi del primo array che hanno chiavi presenti anche nel secondo array
    echo "<h3>array_intersect_key()</h3>";
    $a1 = ["id" => 325, "nome" => "Sherlock Holmes", "città" => "Londra"];
    $a2 = ["id" => 100, "nome" => "Moriarty"];
    echo "Prima:<br>";
    print_r($a1);
    echo "<br>";
    print_r($a2);
    echo "<br><br>";
    $interKey = array_intersect_key($a1, $a2);
    echo "Dopo array_intersect_key() (chiavi comuni):<br>";
    print_r($interKey);
    echo "<br><br>";

    // array_udiff() - confronto con funzione utente
    echo "<h3>array_udiff()</h3>";
    $a1 = ["Londra", "Lisbona", "Lubiana"];
    $a2 = ["londra", "MADRID"];
    echo "Prima:<br>";
    print_r($a1);
    echo "<br>";
    print_r($a2);
    echo "<br><br>";
    $diffU = array_udiff($a1, $a2, "strcasecmp"); // confronto case-insensitive
    echo "Dopo array_udiff() (differenze senza distinzione maiuscole/minuscole):<br>";
    print_r($diffU);
    echo "<br><br>";


    // MANIPOLAZIONE DI ELEMENTI
    echo "<h2>Manipolazione di elementi</h2>";

    // array_push() / array_pop()
    echo "<h3>array_push() / array_pop()</h3>";
    $frutta = ["Mela", "Banana"];
    echo "Prima:<br>";
    print_r($frutta);
    echo "<br><br>";
    array_push($frutta, "Ciliegia", "Pera");
    echo "Dopo array_push():<br>";
    print_r($frutta);
    echo "<br><br>";
    array_pop($frutta);
    echo "Dopo array_pop():<br>";
    print_r($frutta);
    echo "<br><br>";

    // array_unshift() / array_shift()
    echo "<h3>array_unshift() / array_shift()</h3>";
    $frutta = ["Mela", "Banana"];
    echo "Prima:<br>";
    print_r($frutta);
    echo "<br><br>";
    array_unshift($frutta, "Kiwi", "Ananas"); //aggiunge uno o più elementi all’inizio dell’array
    echo "Dopo array_unshift():<br>";
    print_r($frutta);
    echo "<br><br>";
    array_shift($frutta); //rimuove il primo elemento dell’array
    echo "Dopo array_shift():<br>";
    print_r($frutta);
    echo "<br><br>";

    // array_unique()
    echo "<h3>array_unique()</h3>";
    $colori = ["rosso", "verde", "blu", "rosso", "blu"];
    echo "Prima:<br>";
    print_r($colori);
    echo "<br><br>";
    $unici = array_unique($colori);
    echo "Dopo array_unique():<br>";
    print_r($unici);
    echo "<br><br>";

        // shuffle()
    echo "<h3>shuffle()</h3>";

    $numeri = range(1, 10);

    echo "Prima:<br>";
    print_r($numeri);
    echo "<br><br>";

    shuffle($numeri);

    echo "Dopo shuffle():<br>";
    print_r($numeri);
    echo "<br><br>";

?>

</body>
</html>
