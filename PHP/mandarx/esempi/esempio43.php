<!DOCTYPE html>
<html>
<head>
    <title>Override and Overload</title>
</head>
<body>
    <h3>Override e Overload</h3>
    <?php   
    class MathHelper
    {
        public function sum($a, $b)
        {
            return $a + $b;
        }
    }

    class AdvancedMathHelper extends MathHelper
    {
        // OVERRIDE: ridefinisce il metodo sum ereditato
        public function sum($a, $b)
        {
            echo "Sommo $a e $b<br>";
            return $a + $b;
        }

        // OVERLOAD SIMULATO: accetta un numero variabile di argomenti
        public function sumMany(...$nums)
        {
            echo "Sommo " . count($nums) . " numeri<br>";
            return array_sum($nums);
        }
    }

    $m1 = new MathHelper();
    echo $m1->sum(10, 5);
    echo "<br>";

    $m2 = new AdvancedMathHelper();
    echo $m2->sum(10, 5); // override
    echo "<br>";

    echo $m2->sumMany(1, 2, 3); // overload simulato
    echo "<br>";
    echo $m2->sumMany(4, 6, 10, 12); // overload simulato
    echo "<br>";

    ?>
</body>
</html>
