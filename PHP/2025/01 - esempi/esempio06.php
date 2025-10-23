<!DOCTYPE html>
<html>
<head>
    <title>Casting</title>
</head>
<body>

<?php
    // Cast to Integer
    echo "<h3>Cast to Integer</h3>";

    $a = 5;
    $b = 5.34;
    $c = "25 kilometers";
    $d = "kilometers 25";
    $e = "hello";
    $f = true;
    $g = NULL;

    $a = (int)$a;
    $b = (int)$b;
    $c = (int)$c;
    $d = (int)$d;
    $e = (int)$e;
    $f = (int)$f;
    $g = (int)$g;

    var_dump($a, $b, $c, $d, $e, $f, $g);

    // Cast to Float
    echo "<h3>Cast to Float</h3>";

    $a = 5;
    $b = 5.34;
    $c = "25 kilometers";
    $d = "kilometers 25";
    $e = "hello";
    $f = true;
    $g = NULL;

    $a = (float)$a;
    $b = (float)$b;
    $c = (float)$c;
    $d = (float)$d;
    $e = (float)$e;
    $f = (float)$f;
    $g = (float)$g;

    var_dump($a, $b, $c, $d, $e, $f, $g);

    // Cast to Boolean
    echo "<h3>Cast to Boolean</h3>";

    $a = 5;
    $b = 5.34;
    $c = "25 kilometers";
    $d = "kilometers 25";
    $e = "hello";
    $f = "hello";
    $g = "";
    $h = true;
    $i = NULL;
    $j = 0;
    $k = -1;
    $l = 0.1;


    $a = (bool)$a;
    $b = (bool)$b;
    $c = (bool)$c;
    $d = (bool)$d;
    $e = (bool)$e;
    $f = (bool)$f;
    $g = (bool)$g;
    $h = (bool)$h;
    $i = (bool)$i;
    $j = (bool)$j;
    $k = (bool)$k;
    $l = (bool)$l;

    var_dump($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l);

    // Cast to Array
    echo "<h3>Cast to Array</h3>";

    $a = 5;
    $b = 5.34;
    $e = "hello";
    $f = true;
    $g = NULL;


    $a = (array)$a;
    $b = (array)$b;
    $e = (array)$e;
    $f = (array)$f;
    $g = (array)$g;

    print_r($a);
    print_r($b);
    print_r($e);
    print_r($f);
    print_r($g);

    // Cast to Object
    echo "<h3>Cast to Object</h3>";

    $a = 5;
    $b = 5.34;
    $d = "hello";
    $f = true;
    $g = NULL;

    $a = (object)$a;
    $b = (object)$b;
    $e = (object)$e;
    $f = (object)$f;
    $g = (object)$g;

    var_dump($a);
    echo "<br>";
    var_dump($b);
    echo "<br>";
    var_dump($e);
    echo "<br>";
    var_dump($f);
    echo "<br>";
    var_dump($g);
    echo "<br>";

    // Converting Arrays into Objects
    echo "<h3>Converting Arrays into Objects</h3>";

    $a = array("Volvo", "BMW", "Toyota");
    $b = array("Peter" => "35", "Ben" => "37", "Joe" => "43");

    $a = (object)$a;
    $b = (object)$b;

    var_dump($a);
    echo "<br>";
    var_dump($b);
    echo "<br>";


    // Cast to NULL
    echo "<h3>Cast to NULL (unset)</h3>";

    $a = 5;
    $b = 5.34;
    $e = "hello";
    $f = true;
    $g = NULL;

    unset($a);
    unset($b);
    unset($e);
    unset($f);
    unset($g);

    var_dump($a);
    echo "<br>";
    var_dump($b);
    echo "<br>";
    var_dump($e);
    echo "<br>";
    var_dump($f);
    echo "<br>";
    var_dump($g);
    echo "<br>";

    // Type Juggling
    echo "<h3>Type Juggling</h3>";

    // Confronto con == (converte i tipi in automatico)
    echo 0 == false ? 'uguale' : 'diverso'; // vero, perché 0 viene convertito in false
    echo "<br>";

    // Confronto con === (nessuna conversione)
    echo 0 === false ? 'uguale' : 'diverso'; // falso, perché int != bool
    echo "<br>";


    // Confronto con === (nessuna conversione)
    echo 1 === 2 ? 'uguale' : 'diverso'; // falso, perché int != bool
    echo "<br>";


    // Esempi di conversione implicita
    var_dump("10" == 10);   // true (stringa "10" convertita in numero)
    var_dump("10" === 10);  // false (tipi diversi)
    echo "<br>";

    var_dump(0 == "");      // true (stringa vuota convertita in 0). //non piu da php 8
    var_dump(0 === "");     // false (tipi diversi)
    echo "<br>";

    var_dump("0" == false);  // true  (entrambi valutati come 0)
    var_dump("0" === false); // false (tipi diversi)
    echo "<br>";

    var_dump(NULL == "");    // true (NULL convertito in stringa vuota)
    var_dump(NULL === "");   // false (tipi diversi)
?>

</body>
</html>
