<!DOCTYPE html>
<html>
<head>
    <title>Classes: inheritance</title>
</head>
<body>
    <h3>Classi: ereditarietà</h3>
    <?php   
    class Fruit
    {
        // proprietà
        public $name;
        public $color;
        private $debug = true;

        // costruttore
        function __construct($name, $color)
        {
            $this->name = $name;
            $this->color = $color;

            if($this->debug)
            {
                echo "<br>Classe: <i>Fruit</i>, costruisco l'oggetto. Input fornito: nome=$name, colore=$color.<br>";
            }
        }
        
        // distruttore
        function __destruct()
        {
            if($this->debug)
            {
                echo "<br>Classe: <i>Fruit</i>, distruggo l'oggetto {$this->name}.<br>";
            }
        }

        // metodi
        function set_name($name)
        {
            $this->name = $name;
            
            if($this->debug)
            {
                echo "<br>Classe: <i>Fruit</i>, invoco <code>set_name()</code>. Input fornito: nome=$name.<br>";
            }
        }
        
        function get_name()
        {
            if($this->debug)
            {
                echo "<br>Classe: <i>Fruit</i>, invoco <code>get_name()</code>. Restutuisco: {$this->name}.<br>";
            }
            return $this->name;
        }

        public function say_hello()
        {
            echo "<br><span style='color:{$this->color}'>Ciao</span> da {$this->name}.<br>";
        }
    }

    class FruitBerry extends Fruit
    {
        public $stains = false;

        public function stain_warning()
        {
            if($this->stains)
                echo "<br>La bacca {$this->name} potrebbe macchiare.<br>";
            else
                echo "<br>La bacca {$this->name} non dovrebbe macchiare.<br>";
        }
        
    }

    $mela = new Fruit("Anguria", "green");
    $mela->say_hello();
    
    $arancia = new Fruit("Arancia", "orange");
    $arancia->say_hello();


    $fragola = new FruitBerry("Fragola", "red");
    $fragola->say_hello();
    $fragola->stain_warning();

    $gelso = new FruitBerry("Gelso", "#70193D");
    $gelso->say_hello();
    $gelso->stains = true;
    $gelso->stain_warning();


    ?>
</body>
</html>
