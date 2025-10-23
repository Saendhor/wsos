<?php
    namespace MyNamespace;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Magic Constants</title>
</head>
<body>
    
<?php
    // __NAMESPACE__ restituisce il nome del namespace corrente
    echo "__NAMESPACE__: " . __NAMESPACE__ . "<br>";

    // __CLASS__ restituisce il nome della classe
    // __METHOD__ restituisce classe e metodo corrente
    class TestClass
    {
        public function showClass()
        {
            echo "__CLASS__: " . __CLASS__ . "<br>";
        }

        public function showMethod()
        {
            echo "__METHOD__: " . __METHOD__ . "<br>";
        }
    }
    $obj = new TestClass();
    $obj->showClass();
    $obj->showMethod();

    // ClassName::class restituisce il nome completo della classe (namespace + classe)
    echo "ClassName::class: " . TestClass::class . "<br>";

        // __DIR__ restituisce la directory del file corrente
    echo "__DIR__: " . __DIR__ . "<br>";

    // __FILE__ restituisce il percorso completo del file
    echo "__FILE__: " . __FILE__ . "<br>";

    // __FUNCTION__ restituisce il nome della funzione
    function testFunction()
    {
        echo "__FUNCTION__: " . __FUNCTION__ . "<br>";
    }
    testFunction();

    // __LINE__ restituisce il numero di riga corrente
    echo "__LINE__: " . __LINE__ . "<br>";

    // __TRAIT__ restituisce il nome del trait corrente
    trait ExampleTrait
    {
        public function showTrait()
        {
            echo "__TRAIT__: " . __TRAIT__ . "<br>";
        }
    }

    class TraitUser
    {
        use ExampleTrait;
    }
    $t = new TraitUser();
    $t->showTrait();
?>

</body>
</html>
