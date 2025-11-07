<!DOCTYPE html>
<html>
<head>
    <title>Array - Sorting</title>
</head>
<body>

<?php
    $arrIndex = ["Alfa Romeo", "BMW", "Toyota", "Audi", "Honda"];
    echo "<h3>Array indicizzato originale</h3>";
    print_r($arrIndex);
    echo "<br>";

    $arrIndex1 = ["a7", "b11", "b2", "c9", "a3"];
    print_r($arrIndex1);
    echo "<h3>Array indicizzato originale</h3>";
    $tmp = $arrIndex1; // copia per preservare l'originale
    sort($tmp);
    print_r($tmp);
    echo "<br>";


    // sort() -> ordine crescente (reindicizza l'array)
    echo "<h3>sort() - ordine crescente (reindicizza)</h3>";
    $tmp = $arrIndex; // copia per preservare l'originale
    sort($tmp);
    print_r($tmp);
    echo "<br>";

    // rsort() -> ordine decrescente (reindicizza l'array)
    echo "<h3>rsort() - ordine decrescente (reindicizza)</h3>";
    $tmp = $arrIndex;
    rsort($tmp);
    print_r($tmp);
    echo "<br>";


    // Array associativo originale
    $arrAssoc =
    [
        "marcaK" => "Alfa Romeo",
        "marcaA" => "BMW",
        "marcaC" => "Toyota",
        "marcaL" => "Audi",
        "marcaE" => "Honda",
    ];
    echo "<h3>Array associativo originale</h3>";
    print_r($arrAssoc);
    echo "<br>";

    // asort() -> ordina per valori in modo crescente, mantiene le chiavi
    echo "<h3>asort() - ordina per valori (crescente), conserva le chiavi</h3>";
    $tmp = $arrAssoc;
    asort($tmp);
    print_r($tmp);
    echo "<br>";

    // arsort() -> ordina per valori in modo decrescente, mantiene le chiavi
    echo "<h3>arsort() - ordina per valori (decrescente), conserva le chiavi</h3>";
    $tmp = $arrAssoc;
    arsort($tmp);
    print_r($tmp);
    echo "<br>";

    // ksort() -> ordina per chiavi in modo crescente
    echo "<h3>ksort() - ordina per chiavi (crescente)</h3>";
    $tmp = $arrAssoc;
    ksort($tmp);
    print_r($tmp);
    echo "<br>";

    // krsort() -> ordina per chiavi in modo decrescente
    echo "<h3>krsort() - ordina per chiavi (decrescente)</h3>";
    $tmp = $arrAssoc;
    krsort($tmp);
    print_r($tmp);
    echo "<br>";


    // Esempio con array numerico (valori numerici)
    $nums = [4, 1, 23, 7, 0, -5, 100];
    echo "<h3>Array numerico originale</h3>";
    print_r($nums);
    echo "<br>";

    echo "<h3>sort() sui numeri (crescente)</h3>";
    $tmp = $nums;
    sort($tmp);
    print_r($tmp);
    echo "<br>";

    echo "<h3>rsort() sui numeri (decrescente)</h3>";
    $tmp = $nums;
    rsort($tmp);
    print_r($tmp);
    echo "<br>";
    
    // natsort() - ordinamento naturale (alfanumerico, distingue maiuscole/minuscole)
    $files = ["img12.png", "img10.png", "IMG2.png", "img1.png"];
    echo "<h3>natsort() - ordine naturale</h3>";
    print_r($files);
    echo "<br>";
    $tmp = $files;
    natsort($tmp);
    echo "Dopo natsort(): ";
    print_r($tmp);
    echo "<br>";

    // natcasesort() - ordine naturale, ignora maiuscole/minuscole
    echo "<h3>natcasesort() - ordine naturale senza distinzione maiuscole/minuscole</h3>";
    print_r($files);
    echo "<br>";
    $tmp = $files;
    natcasesort($tmp);
    echo "Dopo natcasesort(): ";
    print_r($tmp);
    echo "<br>";

?>

</body>
</html>
