<!DOCTYPE html>
<html>
<head>
    <title>Interfaces</title>
</head>
<body>
    <h3>Interfacce</h3>
    <?php   
    interface Engine
    {
        public function start_engine();
    }

    interface Wheels
    {
        public function number_of_wheels();
    }

    interface TwoWheeledSpecific
    {
        public function do_wheelie();
    }

    class Vehicle implements Engine
    {
        protected $name;
        protected $wheels;

        public function set_name($name)
        {
            $this->name = $name;
        }

        public function get_name()
        {
            return $this->name;
        }

        public function set_wheels($wheels)
        {
            $this->wheels = $wheels;
        }

        public function get_wheels()
        {
            return $this->wheels;
        }

        public function start_engine()
        {
            echo "Il veicolo {$this->name} avvia il motore<br>";
        }
    }

    class Car extends Vehicle implements Wheels
    {
        public function __construct($name)
        {
            $this->name = $name;
            $this->wheels = 4;
        }

        public function number_of_wheels()
        {
            echo "Il veicolo {$this->name} ha {$this->wheels} ruote<br>";
        }
    }

    class Motorcycle extends Vehicle implements Wheels, TwoWheeledSpecific
    {
        public function __construct($name)
        {
            $this->name = $name;
            $this->wheels = 2;
        }

        public function number_of_wheels()
        {
            echo "Il veicolo {$this->name} ha {$this->wheels} ruote<br>";
        }

        public function do_wheelie()
        {
            echo "Il veicolo {$this->name} fa un'impennata!<br>";
        }
    }

    class Boat extends Vehicle
    {
        public function __construct($name)
        {
            $this->name = $name;
            $this->wheels = 0;
        }
    }

    $vehicles = [new Car("DeLorean"), new Motorcycle("Honda CBR 900 RR"), new Boat("Riptide")];

    foreach ($vehicles as $v)
    {
        $v->start_engine(); // Polimorfismo sul motore

        if ($v instanceof Wheels)
        {
            $v->number_of_wheels();
        }

        if ($v instanceof TwoWheeledSpecific)
        {
            $v->do_wheelie();
        }
    }

    ?>
</body>
</html>
