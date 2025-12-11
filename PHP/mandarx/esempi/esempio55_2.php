<!DOCTYPE html>
<html>
<head>
    <title>Manually releasing cycles</title>
</head>
<body>
    <h3>Agire manualmente sui riferimenti ciclici</h3>
    <?php

    function pretty_print_array($arr)
    {
        foreach ($arr as $key => $value)
        {
            echo "[$key] => $value<br>";
        }
    }

    class Nodo
    {
        public $ref;

        public function __destruct()
        {
            // spezza il ciclo quando l'oggetto viene distrutto
            $this->ref = null;
            echo "__destruct chiamato<br>";
        }
    }

    $a = new Nodo();
    $b = new Nodo();

    // ciclo
    $a->ref = $b;
    $b->ref = $a;

    unset($a);
    unset($b);

    // non ci sono più riferimenti cicli
    $cicli = gc_collect_cycles();
    echo "Riferimenti ciclici raccolti: $cicli<br>";

    pretty_print_array(gc_status());

    //NOTA: Il GC non sta dicendo che ha trovato un ciclo,
    // ma che ha liberato un elemento rimasto nel root buffer durante la distruzione degli oggetti.
    ?>
</body>
</html>



