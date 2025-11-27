<!DOCTYPE html>
<html>
<head>
    <title>Abstract Classes</title>
</head>
<body>
    <h3>Classi astratte</h3>
    <?php   
    abstract class Animal
    {
        // ogni specie deve definire il proprio verso
        abstract public function make_sound();

        public function sleep()
        {
            echo "Zzzzzz<br>";
        }
    }

    class Felidae extends Animal // famiglia di felidi
    {
        public function make_sound()
        {
            if (mt_rand(0, 1) === 0)
            {
                echo "Miao<br>";
            }
            else
            {
                echo "Purr<br>"; // fusa
            }
        }
    }

    class Canidae extends Animal   // famiglia di canidi
    {
        public function make_sound()
        {
            if (mt_rand(0, 1) === 0)
            {
                echo "Bau<br>";
            }
            else
            {
                echo "Auuuu<br>"; // ululato
            }
        }
    }

    $gatto = new Felidae();
    $gatto->make_sound();
    $gatto->sleep();

    $cane = new Canidae();
    $cane->make_sound();
    $cane->sleep();

    ?>
</body>
</html>
