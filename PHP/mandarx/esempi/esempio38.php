<!DOCTYPE html>
<html>
<head>
    <title>Classes</title>
</head>
<body>
    <h3>Classi</h3>
    <?php   
    class Fruit
    {
        // proprietà
        public $name;
        public $color;
        private $debug = true;

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

    $mela = new Fruit();
    $banana = new Fruit();
    $mela->set_name('Mela');
    $banana->set_name('Banana');

    echo $mela->get_name();
    echo $banana->get_name();
    ?>
</body>
</html>
