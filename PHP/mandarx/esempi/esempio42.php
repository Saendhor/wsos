<!DOCTYPE html>
<html>
<head>
    <title>Classes: constants</title>
</head>
<body>
    <h3>Classi: costanti</h3>
    <?php   
    class Car
    {
        const DEBUG = true;

        public $brand;
        protected $model;
        protected $year;

        private $id;

        public function set_model($model)
        {
            $this->model = $model;

            if (self::DEBUG)
            {
                echo "<br>Classe: <i>Car</i>, invoco <code>set_model()</code>. Input fornito: $model.<br>";
            }
        }

        public function get_model()
        {
            if (self::DEBUG)
            {
                echo "<br>Classe: <i>Car</i>, invoco <code>get_model()</code>. Restutuisco: {$this->model}.<br>";
            }
            return $this->model;
        }

        public function set_year($year)
        {
            $this->year = $year;

            if (self::DEBUG)
            {
                echo "<br>Classe: <i>Car</i>, invoco <code>set_year()</code>. Input fornito: $year.<br>";
            }
        }

        public function get_year()
        {
            if (self::DEBUG)
            {
                echo "<br>Classe: <i>Car</i>, invoco <code>get_year()</code>. Restutuisco: {$this->year}.<br>";
            }
            return $this->year;
        }

        public function set_id($id)
        {
            $this->id = $id;

            if (self::DEBUG)
            {
                echo "<br>Classe: <i>Car</i>, invoco <code>set_id()</code>. Input fornito: $id.<br>";
            }
        }

        public function get_id()
        {
            if (self::DEBUG)
            {
                echo "<br>Classe: <i>Car</i>, invoco <code>get_id()</code>. Restutuisco: {$this->id}.<br>";
            }
            return $this->id;
        }
    }

    $r4 = new Car();
    $r4->brand = 'Renault';
    $r4->set_model('4');
    $r4->set_year('1985');


    echo "L'auto è una {$r4->brand} {$r4->get_model()} del {$r4->get_year()}";
    ?>
</body>
</html>
