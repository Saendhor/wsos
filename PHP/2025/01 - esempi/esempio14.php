<!DOCTYPE html>
<html>
<head>
    <title>Array</title>
</head>
<body>

<?php
    // Array indicizzato
    echo "<h3>Array indicizzato</h3>";
    $cars = array("Volvo", "BMW", "Toyota");
    var_dump($cars);
    echo "<br>";

    echo "<h3>Array indicizzato</h3>";
    $b = array("Volvo", 5, false);
    var_dump($b);
    echo "<br>";


// Creazione con sintassi breve
    echo "<h3>Creazione con sintassi breve</h3>";
    $cars = ["Volvo", "BMW", "Toyota"];
    print_r($cars);
    echo "<br>";

    // Array vuoto e aggiunta di elementi
    echo "<h3>Array vuoto e aggiunta di elementi</h3>";
    $cars = [];
    $cars[0] = "Volvo";
    $cars[1] = "BMW";
    $cars[2] = "Toyota";
    print_r($cars);
    echo "<br>";

    // Creazione con range()
    echo "<h3>Creazione con range()</h3>";
    $numeri = range(1, 10);
    print_r($numeri);
    echo "<br>";

    // Creazione con compact()
    echo "<h3>Creazione con compact()</h3>";
    $nome = "Sherlock";
    $cognome = "Holmes";
    $id = 375;
    $citta = "Londra";
    $persona = compact("nome", "cognome", "id", "citta");
    print_r($persona);
    echo "<br>";


    // Accesso con indice
    echo "<h3>Accesso con indice</h3>";
    echo $cars[0] . "<br>";

    // Modifica di un elemento
    echo "<h3>Modifica di un elemento</h3>";
    $cars[1] = "Ford";
    var_dump($cars);
    echo "<br>";

    // Ciclo su array indicizzato
    echo "<h3>Ciclo su array indicizzato</h3>";
    foreach ($cars as $x)
    {
        echo "$x <br>";
    }

    // Aggiungere un elemento con array_push()
    echo "<h3>Aggiungere un elemento con array_push()</h3>";
    array_push($cars, "Mazda");
    var_dump($cars);
    echo "<br>";

    // Elementi con tipi di dati diversi
    echo "<h3>Elementi con tipi di dati diversi</h3>";
    $myArr = array("Volvo", 15, ["mele", "banane"]);
    print_r($myArr);
    echo "<br>";

    // Funzione sugli array: count()
    echo "<h3>Funzione sugli array: count()</h3>";
    echo "Numero di auto: " . count($cars) . "<br>";

    // Array associativo
    echo "<h3>Array associativo</h3>";
    $car = array("marca" => "Ford", "modello" => "Mustang", "anno" => 1964);
    var_dump($car);
    echo "<br>";

    // Accesso a un elemento associativo
    echo "<h3>Accesso a un elemento associativo</h3>";
    echo $car["modello"] . "<br>";

    // Modifica di un elemento associativo
    echo "<h3>Modifica di un elemento associativo</h3>";
    $car["anno"] = 2024;
    var_dump($car);
    echo "<br>";

    // Ciclo su array associativo
    echo "<h3>Ciclo su array associativo</h3>";
    foreach ($car as $x => $y)
    {
        echo "$x: $y <br>";
    }


    

    // Array con chiavi miste
    echo "<h3>Array con chiavi miste</h3>";
    $myArr = [];
    $myArr[0] = "mele";
    $myArr[1] = "banane";
    $myArr["frutto"] = "ciliegie";
    print_r($myArr);
    echo "<br>";

    // Esecuzione di una funzione in un array
    echo "<h3>Esecuzione di una funzione in un array</h3>";
    function miaFunzione()
    {
        echo "Vengo da una funzione!";
    }
    $myArr = array("Volvo", 15, "miaFunzione");
    $myArr[2]();
    echo "<br>";

    // Aggiornamento con riferimento in foreach
    echo "<h3>Aggiornamento con riferimento in foreach</h3>";
    $cars = array("Volvo", "BMW", "Toyota");
    foreach ($cars as &$x)
    {
        $x = "Ford";
    }
    unset($x);
    print_r($cars);
    echo "<br>";

    // Aggiungere un elemento
    echo "<h3>Aggiungere un elemento</h3>";
    $frutta = array("Mela", "Banana", "Ciliegia");
    $frutta[] = "Arancia";
    print_r($frutta);
    echo "<br>";

    // Aggiungere un elemento a un array associativo
    echo "<h3>Aggiungere un elemento a un array associativo</h3>";
    $cars = array("marca" => "Ford", "modello" => "Mustang");
    $cars["colore"] = "Rosso";
    print_r($cars);
    echo "<br>";

    // Aggiungere più elementi
    echo "<h3>Aggiungere più elementi</h3>";
    $frutta = array("Mela", "Banana", "Ciliegia");
    array_push($frutta, "Arancia", "Kiwi", "Limone");
    print_r($frutta);
    echo "<br>";

    // Aggiungere più elementi a un array associativo
    echo "<h3>Aggiungere più elementi a un array associativo</h3>";
    $cars = array("marca" => "Ford", "modello" => "Mustang");
    $cars += ["colore" => "Rosso", "anno" => 1964];
    print_r($cars);
    echo "<br>";

    // Rimuovere un elemento
    echo "<h3>Rimuovere un elemento</h3>";
    $cars = array("Volvo", "BMW", "Toyota");
    array_splice($cars, 1, 1);
    print_r($cars);
    echo "<br>";

    // Rimuovere un elemento con unset()
    echo "<h3>Rimuovere un elemento con unset()</h3>";
    $cars = array("Volvo", "BMW", "Toyota");
    unset($cars[1]);
    print_r($cars);
    echo "<br>";

    // Rimuovere più elementi
    echo "<h3>Rimuovere più elementi</h3>";
    $cars = array("Volvo", "BMW", "Toyota");
    unset($cars[0], $cars[1]);
    print_r($cars);
    echo "<br>";

    // Rimuovere un elemento da un array associativo
    echo "<h3>Rimuovere un elemento da un array associativo</h3>";
    $cars = array("marca" => "Ford", "modello" => "Mustang", "anno" => 1964);
    unset($cars["modello"]);
    print_r($cars);
    echo "<br>";

    // Rimuovere valori con array_diff()
    echo "<h3>Rimuovere valori con array_diff()</h3>";
    $cars = array("marca" => "Ford", "modello" => "Mustang", "anno" => 1964);
    $nuovoArray = array_diff($cars, ["Mustang", 1964]);
    print_r($nuovoArray);
    echo "<br>";

    // Rimuovere l’ultimo elemento
    echo "<h3>Rimuovere l’ultimo elemento</h3>";
    $cars = array("Volvo", "BMW", "Toyota");
    array_pop($cars);
    print_r($cars);
    echo "<br>";

    // Rimuovere il primo elemento
    echo "<h3>Rimuovere il primo elemento</h3>";
    $cars = array("Volvo", "BMW", "Toyota");
    array_shift($cars);
    print_r($cars);
    echo "<br>";

    // Array bidimensionale
    echo "<h3>Array bidimensionale</h3>";

    // Nota: in PHP è consentita la virgola finale in un array per prevenire errori quando si aggiungono nuovi elementi. La virgola finale viene semplicemente ignorata dal parser.
    $cars = array(array("Volvo", 22, 18), array("BMW", 15, 13), array("Saab", 5, 2), array("Land Rover", 17, 15),);

    // Accesso diretto agli elementi
    echo "<h3>Accesso diretto agli elementi</h3>";
    echo $cars[0][0] . ": In stock: " . $cars[0][1] . ", vendute: " . $cars[0][2] . ".<br>";
    echo $cars[1][0] . ": In stock: " . $cars[1][1] . ", vendute: " . $cars[1][2] . ".<br>";
    echo $cars[2][0] . ": In stock: " . $cars[2][1] . ", vendute: " . $cars[2][2] . ".<br>";
    echo $cars[3][0] . ": In stock: " . $cars[3][1] . ", vendute: " . $cars[3][2] . ".<br>";

    // Ciclo annidato per leggere tutti i valori
    echo "<h3>Ciclo annidato</h3>";
    for ($riga = 0; $riga < 4; $riga++)
    {
        echo "<p><b>Riga numero $riga</b></p>";
        echo "<ul>";
        for ($col = 0; $col < 3; $col++)
        {
            echo "<li>" . $cars[$riga][$col] . "</li>";
        }
        echo "</ul>";
    }

?>

</body>
</html>
