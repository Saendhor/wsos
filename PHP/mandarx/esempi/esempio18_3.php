<!DOCTYPE html>
<html>
<head>
    <title>Get</title>
</head>
<body>
    <h3>Catalogo strumenti musicali:</h3>
    <!-- Nota: in questa versione passiamo un id-->
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

        foreach ($prodotti as $id => $prodotto)
        {
            echo "<a href='esempio18_4.php?id=$id'>" . $prodotto['prodotto']. " " . $prodotto['marca'] .
             "</a><br>\n";
        }
    ?>
</body>
</html>
