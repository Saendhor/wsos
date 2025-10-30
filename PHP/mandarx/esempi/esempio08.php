<!DOCTYPE html>
<html>
<head>
    <title>Constants</title>
</head>
<body>
    
<?php
    // Definisce una costante con define()
    define("GREETING1", "Hello");
    echo GREETING1;

    // Definisce una costante con la parola chiave const
    const GREETING2 = " world";
    echo GREETING2;

    echo "<br>";

    // Definisce una costante di tipo array (da PHP 7)
    define("cars", ["Alfa Romeo", "BMW", "Toyota"]);
    echo cars[0];

    echo "<br>";

    // Le costanti sono globali: possono essere usate dentro funzioni
    function myTest()
    {
        echo GREETING1;
    }
    myTest();



?>

</body>
</html>
