<!DOCTYPE html>
<html>
<head>
    <title>Array - Comparison, Differences and Element Manipulation</title>
</head>
<body>

<?php
    function pretty_print_array($arr)
    {
        foreach ($arr as $key => $value)
        {
            echo "[$key] => $value<br>";
        }
    }
    // CONFRONTO E DIFFERENZE
    echo "<h2>Confronto e differenze</h2>";

    // array_diff()
    echo "<h3>array_diff()</h3>";
    $a1 = ["Londra", "Vienna", "Lisbona"];
    $a2 = ["Lisbona", "Barcellona"];
    echo "Prima:<br>";
    echo "\$a1 =<br>";
    pretty_print_array($a1);
    echo "<br>\$a2 =<br>";
    pretty_print_array($a2);
    echo "<br><br>";
    $diff = array_diff($a1, $a2);
    echo "Dopo array_diff() (elementi in \$a1 ma non in \$a2):<br>";
    pretty_print_array($diff);
    echo "<br><br>";

    // array_diff_assoc()
    echo "<h3>array_diff_assoc()</h3>";
    $a1 = ["id" => 325, "nome" => "Sherlock Holmes", "città" => "Londra"];
    $a2 = ["id" => 325, "nome" => "John Watson", "città" => "Londra"];
    echo "Prima:<br>";
    pretty_print_array($a1);
    echo "<br>";
    pretty_print_array($a2);
    echo "<br><br>";
    $diffAssoc = array_diff_assoc($a1, $a2);
    echo "Dopo array_diff_assoc() (differenze chiave+valore \$a1->\$a2):<br>";
    pretty_print_array($diffAssoc);
    echo "<br><br>";
    $diffAssoc = array_diff_assoc($a2, $a1);
    echo "Dopo array_diff_assoc() (differenze chiave+valore  \$a2->\$a1):<br>";
    pretty_print_array($diffAssoc);
    echo "<br><br>";

    // array_diff_key()
    echo "<h3>array_diff_key()</h3>";
    $a1 = ["nome" => "Sherlock Holmes", "città" => "Londra", "id" => 325];
    $a2 = ["nome" => "Sherlock Holmes", "città" => "Londra"];
    echo "Prima:<br>";
    pretty_print_array($a1);
    echo "<br>";
    pretty_print_array($a2);
    echo "<br><br>";
    $diffKey = array_diff_key($a1, $a2);
    echo "Dopo array_diff_key() (chiavi presenti solo nel primo array):<br>";
    pretty_print_array($diffKey);
    echo "<br><br>";

    // array_intersect()
    echo "<h3>array_intersect()</h3>";
    $a1 = ["Londra", "Lisbona", "Lubiana"];
    $a2 = ["Lisbona", "Londra", "Barcellona"];
    echo "Prima:<br>";
    pretty_print_array($a1);
    echo "<br>";
    pretty_print_array($a2);
    echo "<br><br>";
    $intersect = array_intersect($a1, $a2);
    echo "Dopo array_intersect() (elementi comuni):<br>";
    pretty_print_array($intersect);
    echo "<br><br>";

    // array_intersect_assoc()
    echo "<h3>array_intersect_assoc()</h3>";
    $a1 = ["id" => 325, "nome" => "Sherlock Holmes", "città" => "Londra"];
    $a2 = ["id" => 325, "nome" => "John Watson", "città" => "Londra"];
    echo "Prima:<br>";
    pretty_print_array($a1);
    echo "<br>";
    pretty_print_array($a2);
    echo "<br><br>";
    $interAssoc = array_intersect_assoc($a1, $a2);
    echo "Dopo array_intersect_assoc() (elementi identici chiave+valore):<br>";
    pretty_print_array($interAssoc);
    echo "<br><br>";

    // array_intersect_key() Restituisce gli elementi del primo array che hanno chiavi presenti anche nel secondo array
    echo "<h3>array_intersect_key()</h3>";
    $a1 = ["id" => 325, "nome" => "Sherlock Holmes", "città" => "Londra"];
    $a2 = ["id" => 100, "nome" => "Moriarty"];
    echo "Prima:<br>";
    pretty_print_array($a1);
    echo "<br>";
    pretty_print_array($a2);
    echo "<br><br>";
    $interKey = array_intersect_key($a1, $a2);
    echo "Dopo array_intersect_key() (chiavi comuni):<br>";
    pretty_print_array($interKey);
    echo "<br><br>";

    // array_udiff() - confronto mediante funzione utente
    echo "<h3>array_udiff()</h3>";

    // Primo esempio: differenze tra due array di città
    $a1 = ["Londra", "Lisbona", "Lubiana"];
    $a2 = ["londra", "MADRID"];

    echo "Prima:<br>";
    pretty_print_array($a1);
    echo "<br>";
    pretty_print_array($a2);
    echo "<br><br>";

    // array_udiff() confronta gli elementi dei due array usando una funzione personalizzata
    // In questo caso, "strcasecmp" confronta le stringhe ignorando maiuscole/minuscole
    $diffU = array_udiff($a1, $a2, "strcasecmp");

    // Restituisce gli elementi presenti in $a1 ma non in $a2 (case-insensitive)
    echo "Dopo array_udiff() (differenze senza distinzione maiuscole/minuscole):<br>";
    pretty_print_array($diffU);
    echo "<br><br>";

    // Secondo esempio: ordine invertito dei due array
    echo "<h3>array_udiff()</h3>";

    $a1 = ["londra", "MADRID"];
    $a2 = ["Londra", "Lisbona", "Lubiana"];

    echo "Prima:<br>";
    pretty_print_array($a1);
    echo "<br>";
    pretty_print_array($a2);
    echo "<br><br>";

    // Stesso confronto case-insensitive
    // Ora cerca gli elementi presenti in $a1 ma non in $a2
    $diffU = array_udiff($a1, $a2, "strcasecmp");

    // Risultato: "MADRID" è mantenuta perché non esiste in $a2 (Londra è ignorata per via del confronto case-insensitive)
    echo "Dopo array_udiff() (differenze senza distinzione maiuscole/minuscole):<br>";
    pretty_print_array($diffU);
    echo "<br><br>";


    // MANIPOLAZIONE DI ELEMENTI
    echo "<h2>Manipolazione di elementi</h2>";

    // array_push() / array_pop()
    echo "<h3>array_push() / array_pop()</h3>";
    $frutta = ["Mela", "Banana"];
    echo "Prima:<br>";
    pretty_print_array($frutta);
    echo "<br><br>";
    array_push($frutta, "Ciliegia", "Pera");
    echo "Dopo array_push():<br>";
    pretty_print_array($frutta);
    echo "<br><br>";
    array_pop($frutta);
    echo "Dopo array_pop():<br>";
    pretty_print_array($frutta);
    echo "<br><br>";

    // array_unshift() / array_shift()
    echo "<h3>array_unshift() / array_shift()</h3>";
    $frutta = ["Mela", "Banana"];
    echo "Prima:<br>";
    pretty_print_array($frutta);
    echo "<br><br>";
    array_unshift($frutta, "Kiwi", "Ananas"); //aggiunge uno o più elementi all’inizio dell’array
    echo "Dopo array_unshift():<br>";
    pretty_print_array($frutta);
    echo "<br><br>";
    array_shift($frutta); //rimuove il primo elemento dell’array
    echo "Dopo array_shift():<br>";
    pretty_print_array($frutta);
    echo "<br><br>";

    // array_unique()
    echo "<h3>array_unique()</h3>";
    $colori = ["rosso", "verde", "blu", "rosso", "blu"];
    echo "Prima:<br>";
    pretty_print_array($colori);
    echo "<br><br>";
    $unici = array_unique($colori);
    echo "Dopo array_unique():<br>";
    pretty_print_array($unici);
    echo "<br><br>";

        // shuffle()
    echo "<h3>shuffle()</h3>";

    $numeri = range(1, 10);

    echo "Prima:<br>";
    pretty_print_array($numeri);
    echo "<br><br>";

    shuffle($numeri);

    echo "Dopo shuffle():<br>";
    pretty_print_array($numeri);
    echo "<br><br>";

?>

</body>
</html>
