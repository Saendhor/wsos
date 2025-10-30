<!DOCTYPE html>
<html>
<head>
    <title>Numbers</title>
</head>
<body>

<?php
    $a = 5;
    $b = 5.34;
    $c = "25";

    var_dump($a);
    echo "<br>";

    var_dump($b);
    echo "<br>";

    var_dump($c);
    echo "<br>";

    $x = 5985;
    var_dump(is_int($x));
    echo "<br>";

    $x = 59.85;
    var_dump(is_int($x));
    echo "<br>";

    $x = 10.365;
    var_dump(is_float($x));
    echo "<br>";


    $x = 1.9e411;
    var_dump(is_infinite($x));
    echo "<br>";


    $x = acos(8);
    var_dump($x);
    echo "<br>";

?>

</body>
</html>
