<!DOCTYPE html>
<html>
<head>
    <title>Garbage Collector</title>
</head>
<body>
    <h3>Garbage Collector</h3>
    <?php
        echo "Valore di default nella configurazione: " . ini_get("zend.enable_gc") . "<br>";

        echo "GC attivo? " . (gc_enabled() ? "sì" : "no") . "<br>";

        gc_disable();
        echo "GC attivo? " . (gc_enabled() ? "sì" : "no") . "<br>";

        gc_enable();
        echo "GC attivo? " . (gc_enabled() ? "sì" : "no") . "<br>";

        class Nodo
        {
            public $ref;
        }

        // creo un riferimento ciclico
        $a = new Nodo();
        $b = new Nodo();

        $a->ref = $b;
        $b->ref = $a;

        // distruggo le variabili, ma il riferimento ciclico rimane vivo in memoria
        unset($a);
        unset($b);
        // il reference counting NON può liberarlo da solo.

        // forzo l’analisi delle strutture cicliche.
        echo "Riferimenti ciclici individuati e rimossi: " . gc_collect_cycles() . "<br>";
    ?>
</body>
</html>



