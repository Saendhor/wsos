<!DOCTYPE html>
<html>
<head>
    <title>Static Methods</title>
</head>
<body>
    <h3>Metodi statici</h3>
    <?php   

    class MathUtils
    {
        public static function percent($value, $percentage)
        {
            return ($value * $percentage) / 100;
        }

        public static function clamp($value, $min, $max)
        {
            return max($min, min($value, $max));
        }

        public static function is_even($number)
        {
            return $number % 2 === 0;
        }

        public static function random_range($min, $max)
        {
            return mt_rand($min, $max);
        }

        public static function normalize($value, $min, $max)
        {
            if ($max === $min)
                return 0;

            return ($value - $min) / ($max - $min);
       }
    }

    // uso diretto, senza creare istanze
    echo "Percentuale:" . MathUtils::percent(250, 20) ."<br>";
    echo "Clamp:" . MathUtils::clamp(150, 0, 100) . "<br>";
    echo "Parità:" . (MathUtils::is_even(42) ? "pari" : "dispari") ."<br>";
    echo "Causale in un range:" . MathUtils::random_range(10, 20) . "<br>";
    echo "Normalizzazione:" . MathUtils::normalize(75, 0, 100) . "<br>";


    ?>
</body>
</html>
