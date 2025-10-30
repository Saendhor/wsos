<!DOCTYPE html>
<html>
<head>
    <title>Loops</title>
</head>
<body>

<?php
    // Ciclo WHILE
    echo "<h3>While</h3>";

    $i = 1;
    while ($i < 6)
    {
        echo $i . "<br>";
        $i++;
    }

    // while con break
    echo "<h3>While con break</h3>";

    $i = 1;
    while ($i < 6)
    {
        if ($i == 3)
        {
            break;
        }

        echo $i . "<br>";
        $i++;
    }

    // while con continue
    echo "<h3>While con continue</h3>";

    $i = 0;
    while ($i < 6)
    {
        $i++;
        if ($i == 3)
        {
            continue;
        }

        echo $i . "<br>";
    }

    // Sintassi alternativa di while
    echo "<h3>While (sintassi alternativa)</h3>";

    $i = 1;
    while ($i < 6):
        echo $i . "<br>";
        $i++;
    endwhile;

    // Ciclo DO...WHILE
    echo "<h3>Do...While</h3>";

    $i = 1;
    do
    {
        echo $i . "<br>";
        $i++;
    } while ($i < 6);

    // do...while che esegue comunque una volta
    echo "<h3>Do...While (condizione falsa)</h3>";

    $i = 8;
    do
    {
        echo $i . "<br>";
        $i++;
    } while ($i < 6);

    // do...while con break
    echo "<h3>Do...While con break</h3>";

    $i = 1;
    do
    {
        if ($i == 3)
        {
            break;
        }

        echo $i . "<br>";
        $i++;
    } while ($i < 6);

    // Ciclo FOR
    echo "<h3>For</h3>";

    for ($x = 0; $x <= 10; $x++)
    {
        echo "The number is: $x <br>";
    }

    // for con break
    echo "<h3>For con break</h3>";

    for ($x = 0; $x <= 10; $x++)
    {
        if ($x == 3)
        {
            break;
        }

        echo "The number is: $x <br>";
    }

    // for con continue
    echo "<h3>For con continue</h3>";

    for ($x = 0; $x <= 10; $x++)
    {
        if ($x == 3)
        {
            continue;
        }

        echo "The number is: $x <br>";
    }

    // Ciclo foreach
    echo "<h3>Foreach (array semplice)</h3>";

    $colors = array("red", "green", "blue", "yellow");
    foreach ($colors as $x)
    {
        echo "$x <br>";
    }

    echo "<h3>Foreach (array associativo)</h3>";

    $members = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
    foreach ($members as $x => $y)
    {
        echo "$x : $y <br>";
    }

    // Ciclo foreach comn oggetto
    echo "<h3>Foreach (oggetto)</h3>";

    class Car
    {
        public $color;
        public $model;
        public function __construct($color, $model)
        {
            $this->color = $color;
            $this->model = $model;
        }
    }
    $myCar = new Car("red", "Volvo");
    foreach ($myCar as $x => $y)
    {
        echo "$x: $y <br>";
    }

    // foreach con break
    echo "<h3>Foreach con break</h3>";

    $colors = array("red", "green", "blue", "yellow");
    foreach ($colors as $x)
    {
        if ($x == "blue")
        {
            break;
        }

        echo "$x <br>";
    }

    // foreach con continue
    echo "<h3>Foreach con continue</h3>";

    $colors = array("red", "green", "blue", "yellow");
    foreach ($colors as $x)
    {
        if ($x == "blue")
        {
            continue;
        }

        echo "$x <br>";
    }

    // foreach sintassi alternativa
    echo "<h3>Foreach (sintassi alternativa)</h3>";

    $colors = array("red", "green", "blue", "yellow");
    foreach ($colors as $x):
        echo "$x <br>";
    endforeach;

?>


</body>
</html>
