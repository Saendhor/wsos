<!DOCTYPE html>
<html>
<head>
    <title>Array - Filtering, Transformation, Search and Verification</title>
</head>
<body>

<?php
    // FILTRAGGIO E TRASFORMAZIONE
    echo "<h2>Filtraggio e trasformazione</h2>";

    // array_filter()
    echo "<h3>array_filter()</h3>";
    $numeri = [1, 2, 3, 4, 5, 6];
    echo "Prima:<br>";
    print_r($numeri);
    echo "<br><br>";
    $pari = array_filter($numeri, fn($n) => $n % 2 == 0);// usa una funzione anonima (lambda)
    echo "Dopo array_filter() (solo valori pari):<br>";
    print_r($pari);
    echo "<br><br>";

    // array_map()
    echo "<h3>array_map()</h3>";
    $numeri = [1, 2, 3, 4];
    echo "Prima:<br>";
    print_r($numeri);
    echo "<br><br>";
    $quadrati = array_map(fn($n) => $n ** 2, $numeri);// usa una funzione anonima (lambda)
    echo "Dopo array_map() (quadrato di ogni numero):<br>";
    print_r($quadrati);
    echo "<br><br>";

    // array_walk()
    echo "<h3>array_walk() con funzione esterna</h3>";

    function inMaiuscolo(&$valore, $chiave)
    {
        $valore = strtoupper($valore);
    }

    $frutta = ["Mela", "Pera", "Banana"];

    echo "Prima:<br>";
    print_r($frutta);
    echo "<br><br>";

    array_walk($frutta, "inMaiuscolo");

    echo "Dopo array_walk():<br>";
    print_r($frutta);
    echo "<br><br>";

    // array_walk() - alternativa con funzione interna
    echo "<h3>array_walk() con funzione interna</h3>";
    $frutta = ["Mela", "Pera", "Banana"];
    echo "Prima:<br>";
    print_r($frutta);
    echo "<br><br>";
    array_walk($frutta, function (&$v, $k) { $v = strtoupper($v); });
    echo "Dopo array_walk():<br>";
    print_r($frutta);
    echo "<br><br>";

    // array_walk_recursive()
    echo "<h3>array_walk_recursive()</h3>";
    $dati = [
        "persona" => ["nome" => "Sherlock", "hobby" => ["musica", "pugilato"]]
    ];
    echo "Prima:<br>";
    print_r($dati);
    echo "<br><br>";
    array_walk_recursive($dati, function (&$v) { $v = ucfirst($v); });
    echo "Dopo array_walk_recursive() (prima lettera maiuscola):<br>";
    print_r($dati);
    echo "<br><br>";

    // array_reduce()
    echo "<h3>array_reduce()</h3>";
    $numeri = [1, 2, 3, 4, 5];
    echo "Prima:<br>";
    print_r($numeri);
    echo "<br><br>";
    $somma = array_reduce($numeri, fn($acc, $n) => $acc + $n, 0);
    echo "Dopo array_reduce() (somma totale): $somma<br><br>";


    // RICERCA E VERIFICA
    echo "<h2>Ricerca e verifica</h2>";

    // in_array()
    echo "<h3>in_array()</h3>";
    $colori = ["rosso", "verde", "blu"];
    echo "Array:<br>";
    print_r($colori);
    echo "<br><br>";
    echo "Risultato di in_array('verde'): ";
    var_dump(in_array("verde", $colori));
    echo "<br>";
    echo "Risultato di in_array('giallo'): ";
    var_dump(in_array("giallo", $colori));
    echo "<br><br>";

    // array_key_exists()
    echo "<h3>array_key_exists()</h3>";
    $persona = ["nome" => "Anna", "eta" => 25];
    echo "Array:<br>";
    print_r($persona);
    echo "<br><br>";
    echo "Risultato di array_key_exists('eta'): ";
    var_dump(array_key_exists("eta", $persona));
    echo "<br>";    
    echo "Risultato di array_key_exists('altezza'): ";
    var_dump(array_key_exists("altezza", $persona));
    echo "<br><br>";

    // array_search()
    echo "<h3>array_search()</h3>";
    $colori = ["rosso", "verde", "blu"];
    echo "Array:<br>";
    print_r($colori);
    echo "<br><br>";
    $pos = array_search("verde", $colori);
    echo "Dopo array_search('verde'): indice = $pos";
    echo "<br>";
    $pos = array_search("giallo", $colori);
    echo "Dopo array_search('giallo'): indice = $pos";
    echo "<br><br>";


    // array_keys() / array_values()
    echo "<h3>array_keys() / array_values()</h3>";
    $persona = ["nome" => "Sherlock", "cognome" => "Holmes", "id" => 235, "citta" => "Londra"];
    echo "Prima:<br>";
    print_r($persona);
    echo "<br><br>";
    echo "Chiavi:<br>";
    print_r(array_keys($persona));
    echo "<br>Valori:<br>";
    print_r(array_values($persona));
    echo "<br><br>";
?>

</body>
</html>
