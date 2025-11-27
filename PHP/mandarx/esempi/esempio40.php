<!DOCTYPE html>
<html>
<head>
    <title>Classes: modifiers</title>
</head>
<body>
    <h3>Classi: modificatori</h3>
    <?php   
    class Car
    {
        public $brand;
        protected $model;
        private $year;   
    }

    $auto = new Car();
    $auto->brand = 'Renault';  // OK
    $auto->model = '4'; // ERRORE
    $auto->year = 1985;       // ERRORE
    ?>
</body>
</html>
