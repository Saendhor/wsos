<!DOCTYPE html>
<html>
<head>
    <title>Dettaglio prodotto</title>
</head>
<body>

<?php
    $prodotti =
        [
            1 => ['prodotto' => 'Chitarra elettrica', 'prezzo' => 499, 'marca' => 'Fender'],
            2 => ['prodotto' => 'Chitarra acustica', 'prezzo' => 329, 'marca' => 'Yamaha'],
            3 => ['prodotto' => 'Amplificatore', 'prezzo' => 399, 'marca' => 'Marshall'],
            4 => ['prodotto' => 'Pedale distorsione', 'prezzo' => 149, 'marca' => 'Boss'],
            5 => ['prodotto' => 'Cavo jack 3m', 'prezzo' => 19, 'marca' => 'Proel'],
            6 => ['prodotto' => 'Basso elettrico', 'prezzo' => 589, 'marca' => 'Ibanez'],
            7 => ['prodotto' => 'Tastiera MIDI', 'prezzo' => 249, 'marca' => 'Akai'],
            8 => ['prodotto' => 'Batteria elettronica', 'prezzo' => 899, 'marca' => 'Roland'],
            9 => ['prodotto' => 'Microfono', 'prezzo' => 119, 'marca' => 'Shure'],
            10 => ['prodotto' => 'Cuffie da studio', 'prezzo' => 89, 'marca' => 'Audio-Technica'],
        ];

    $id = $_GET["id"];
    echo "<h3>Dettaglio prodotto:</h3>";
    echo "Prodotto: " . $prodotti[$id]["prodotto"] . "<br>";
    echo "Marca: " . $prodotti[$id]["marca"] . "<br>";
    echo "Prezzo: €" . $prodotti[$id]["prezzo"];
?>

</body>
</html>
