<!DOCTYPE html>
<html>
<head>
    <title>Classes: constructor and destructor</title>
</head>
<body>
    <h3>Classi: costruttore e distruttore</h3>
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
    }

    $mela = new Fruit("Mela", "rosso");
    $banana = new Fruit("Banana", "giallo");

    echo $mela->get_name();
    echo $banana->get_name();

    $mela->set_name("Ananas");
    echo $mela->get_name();
    ?>
</body>
</html>
