<!DOCTYPE html>
<html>
<head>
    <title>Array - Modification, merging and splitting</title>
</head>
<body>

<?php
    // MODIFICA DI CHIAVI E VALORI
    echo "<h2>Modifica di chiavi e valori</h2>";

    // array_change_key_case()
    echo "<h3>array_change_key_case()</h3>";
    $car = ["Marca" => "Alfa Romeo", "Modello" => "8c", "Anno" => 2010];
    print_r($car);
    echo "<br>";
    $lower = array_change_key_case($car, CASE_LOWER);
    print_r($lower);
    echo "<br><br>";

    // array_combine()
    echo "<h3>array_combine()</h3>";
    $chiavi = ["nome", "cognome", "id"];
    $valori = ["Sherlock", "Holmes", 375];
    $persona = array_combine($chiavi, $valori);
    print_r($persona);
    echo "<br><br>";

    // array_fill()
    echo "<h3>array_fill()</h3>";
    $riempito = array_fill(0, 5, "PHP");
    print_r($riempito);
    echo "<br><br>";

    // array_fill_keys()
    echo "<h3>array_fill_keys()</h3>";
    $keys = ["a", "b", "c"];
    $filled = array_fill_keys($keys, "valore");
    print_r($filled);
    echo "<br><br>";

    // array_replace()
    echo "<h3>array_replace()</h3>";

    $a1 = ["rosso", "verde", "blu"];
    $a2 = [1 => "giallo"];
    echo "Prima:<br>";
    echo "\$a1 = ";
    print_r($a1);
    echo "<br>\$a2 = ";
    print_r($a2);
    echo "<br><br>";

    $sostituito = array_replace($a1, $a2);

    echo "Dopo array_replace():<br>";
    print_r($sostituito);
    echo "<br><br>";

    echo "<h3>array_replace_recursive()</h3>";
    $a1 =
    [
        "auto" =>
        [
            "marca" => "Ford",
            "dettagli" =>
            [
                "colore" => "rosso",
                "porte" => 3
            ]
        ]
    ];

    $a2 =
    [
        "auto" =>
        [
            "dettagli" =>
            [
                "colore" => "blu",
                "anno" => 2024
            ]
        ]
    ];

    echo "Prima:<br>";
    echo "\$a1 = ";
    print_r($a1);
    echo "<br>\$a2 = ";
    print_r($a2);
    echo "<br><br>";

    $nuovo = array_replace_recursive($a1, $a2);

    echo "Dopo array_replace_recursive():<br>";
    print_r($nuovo);
    echo "<br><br>";


    // SUDDIVISIONE E FUSIONE
    echo "<h2>Suddivisione e fusione</h2>";

    // array_chunk()
        // array_chunk()
    echo "<h3>array_chunk()</h3>";

    $numeri = range(1, 10);

    echo "Prima:<br>";
    echo "<pre>";
    print_r($numeri);
    echo "</pre>";

    $blocchi = array_chunk($numeri, 3);

    echo "Dopo array_chunk():<br>";
    echo "<pre>"; // mantiene gli spazi e va a capo
    print_r($blocchi);
    echo "</pre>";
    echo "<br><br>";


        // array_merge()
    echo "<h3>array_merge()</h3>";

    $arr1 = ["rosso", "verde"];
    $arr2 = ["blu", "giallo"];

    echo "Prima:<br>";
    echo "\$arr1 = ";
    print_r($arr1);
    echo "<br>\$arr2 = ";
    print_r($arr2);
    echo "<br><br>";

    $unito = array_merge($arr1, $arr2);

    echo "Dopo array_merge():<br>";
    print_r($unito);
    echo "<br><br>";


        // array_merge() con array associativi
    echo "<h3>array_merge() con array associativi</h3>";

    $arr1 = ["colore" => "rosso", "forma" => "cerchio"];
    $arr2 = ["colore" => "blu", "dimensione" => "grande"];

    echo "Prima:<br>";
    echo "\$arr1 = ";
    print_r($arr1);
    echo "<br>\$arr2 = ";
    print_r($arr2);
    echo "<br><br>";

    $unitoAssoc = array_merge($arr1, $arr2);

    echo "Dopo array_merge():<br>";
    print_r($unitoAssoc);
    echo "<br><br>";

    // array_merge_recursive()
    echo "<h3>array_merge_recursive()</h3>";

    $arr1 = ["colore" => "rosso", "forma" => "cerchio"];
    $arr2 = ["colore" => "blu", "dimensione" => "grande"];

    echo "Prima:<br>";
    echo "\$arr1 = ";
    print_r($arr1);
    echo "<br>\$arr2 = ";
    print_r($arr2);
    echo "<br><br>";

    $unitoRec = array_merge_recursive($arr1, $arr2);

    echo "Dopo array_merge_recursive():<br>";
    echo "<pre>";
    print_r($unitoRec);
    echo "</pre>";
    echo "<br><br>";

        // array_splice()
    echo "<h3>array_splice()</h3>";

    $frutta = ["Mela", "Banana", "Ciliegia", "Arancia"];

    echo "Prima:<br>";
    print_r($frutta);
    echo "<br><br>";

    array_splice($frutta, 1, 2, ["Kiwi", "Pera"]);

    echo "Dopo array_splice():<br>";
    print_r($frutta);
    echo "<br><br>";


    // array_slice()
    echo "<h3>array_slice()</h3>";

    $frutta = ["Mela", "Banana", "Ciliegia", "Arancia", "Kiwi"];

    echo "Prima:<br>";
    print_r($frutta);
    echo "<br><br>";

    $porzione = array_slice($frutta, 1, 3);

    echo "Dopo array_slice():<br>";
    print_r($porzione);
    echo "<br><br>";
?>

</body>
</html>
