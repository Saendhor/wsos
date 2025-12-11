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
    }

    $a = new Nodo();
    $b = new Nodo();

    $a->ref = $b;
    $b->ref = $a;

    // spezza il ciclo manualmente
    $a->ref = null;
    unset($a);

    $b->ref = null;
    unset($b);

    // non ci sono più riferimenti cicli
    $cicli = gc_collect_cycles();
    echo "Riferimenti ciclici raccolti: $cicli<br>";

    pretty_print_array(gc_status());

    ?>
</body>
</html>



