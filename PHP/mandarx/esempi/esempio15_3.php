<!DOCTYPE html>
<html>
<head>
    <title>Array - Filtering, Transformation, Search and Verification</title>
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

    // se si vuole fare una funzione custom si puo invocare quella originale partendo da un'altra versione
    function array_map2(array $array, callable $callback): array
    {
        return array_map($callback, $array);
    }


    // FILTRAGGIO E TRASFORMAZIONE
    echo "<h2>Filtraggio e trasformazione</h2>";

    // array_filter()
    echo "<h3>array_filter()</h3>";
    $numeri = [1, 2, 3, 4, 5, 6];
    echo "Prima:<br>";
    pretty_print_array($numeri);
    echo "<br><br>";
    $pari = array_filter($numeri, fn($n) => $n % 2 == 0);// usa una funzione anonima (lambda)
    echo "Dopo array_filter() (solo valori pari):<br>";
    pretty_print_array($pari);
    echo "<br><br>";

    echo "<h3>array_filter()</h3>";
    $numeri = [1, 5, 10, 15, 20];
    echo "Prima:<br>";
    pretty_print_array($numeri);
    echo "<br><br>";
    $maggiori = array_filter($numeri, fn($n) => $n > 10);// usa una funzione anonima (lambda)
    echo "Dopo array_filter() (solo valori maggiori di 10):<br>";
    pretty_print_array($maggiori);
    echo "<br><br>";

    echo "<h3>array_filter()</h3>";
    $nomi = ["Sam", "Heinrich", "Eli", "Philip"];
    echo "Prima:<br>";
    pretty_print_array($nomi);
    echo "<br><br>";
    $nomiLunghi = array_filter($nomi, fn($n) => strlen($n) > 4); // usa una funzione anonima (lambda)
    echo "Dopo array_filter() (solo nomi piu lunghi di 4 caratteri):<br>";
    pretty_print_array($nomiLunghi);
    echo "<br><br>";

    echo "<h3>array_filter()</h3>";
    $valori = [0, 1, 0.0, '0', "", "ok", false, "ciao", null];
    echo "Prima:<br>";
    pretty_print_array($valori);
    echo "<br><br>";
    $non_vuoti = array_filter($valori); // non usa una lambda ma filtra i valori non "falsy"
    echo "Dopo array_filter() (solo valori non vuoti):<br>";
    pretty_print_array($non_vuoti);
    echo "<br><br>";

    // array_map()
    echo "<h3>array_map()</h3>";
    $numeri = [1, 2, 3, 4];
    echo "Prima:<br>";
    pretty_print_array($numeri);
    echo "<br><br>";
    //chiamo la versione custom fatta a lezione
    $quadrati = array_map2($numeri, fn($n) => $n ** 2); // usa una funzione anonima (lambda)
    //versione originale
    //$quadrati = array_map(fn($n) => $n ** 2, $numeri);// usa una funzione anonima (lambda)
    echo "Dopo array_map() (quadrato di ogni numero):<br>";
    pretty_print_array($quadrati);
    echo "<br><br>";

    // array_walk()
    echo "<h3>array_walk() con funzione esterna</h3>";

    function inMaiuscolo(&$valore, $chiave)
    {
        $valore = strtoupper($valore);
    }

    $frutta = ["Mela", "Pera", "Banana"];

    echo "Prima:<br>";
    pretty_print_array($frutta);
    echo "<br><br>";

    array_walk($frutta, "inMaiuscolo");

    echo "Dopo array_walk():<br>";
    pretty_print_array($frutta);
    echo "<br><br>";

    // array_walk() - alternativa con funzione interna
    echo "<h3>array_walk() con funzione interna</h3>";
    $frutta = ["Mela", "Pera", "Banana"];
    echo "Prima:<br>";
    pretty_print_array($frutta);
    echo "<br><br>";
    array_walk($frutta, function (&$v, $k) { $v = strtoupper($v); });
    echo "Dopo array_walk():<br>";
    pretty_print_array($frutta);
    echo "<br><br>";

    // array_walk_recursive()
    echo "<h3>array_walk_recursive()</h3>";
    $dati =
    [
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
    pretty_print_array($numeri);
    echo "<br><br>";
    $somma = array_reduce($numeri, fn($acc, $n) => $acc + $n, 0);
    echo "Dopo array_reduce() (somma totale): $somma<br><br>";


    // RICERCA E VERIFICA
    echo "<h2>Ricerca e verifica</h2>";

    // in_array()
    echo "<h3>in_array()</h3>";
    $colori = ["rosso", "verde", "blu"];
    echo "Array:<br>";
    pretty_print_array($colori);
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
    pretty_print_array($persona);
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
    pretty_print_array($colori);
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
    pretty_print_array($persona);
    echo "<br><br>";
    echo "Chiavi:<br>";
    pretty_print_array(array_keys($persona));
    echo "<br>Valori:<br>";
    pretty_print_array(array_values($persona));
    echo "<br><br>";
?>

</body>
</html>
