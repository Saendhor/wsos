<!DOCTYPE html>
<html>
<head>
    <title>Monitoring memory</title>
</head>
<body>
    <h3>Monitorare la memoria</h3>
    <?php
    function pretty_print_array($arr)
    {
        foreach ($arr as $key => $value)
        {
            echo "[$key] => $value<br>";
        }
    }

    echo "Memoria iniziale: " . memory_get_usage() . "<br>";

    for ($i = 0; $i < 5000; $i++)
    {
        $a = [];
        $b = [];

        $a['ref'] = &$b;
        $b['ref'] = &$a;

        unset($a);
        unset($b);
    }

    echo "Memoria prima della raccolta: " . memory_get_usage() . "<br>";

    $cicli = gc_collect_cycles();
    echo "Riferimenti ciclici raccolti: $cicli<br>";

    echo "Memoria dopo la raccolta: " . memory_get_usage() . "<br>";

    pretty_print_array(gc_status());

    ?>

<pre>
Significato:

running
Se il GC è attualmente in esecuzione. Vuoto = no.

protected
Indica se il GC è temporaneamente protetto da esecuzioni ricorsive. Vuoto = libero.

full
Indica se è stata fatta una full collection. Vuoto = no.

runs
Quante volte il GC è stato eseguito automaticamente o manualmente.

collected
Numero totale di elementi circolari che il GC ha liberato.

threshold
Soglia dopo la quale il GC automatico parte da solo.

buffer_size
Capacità massima del buffer del GC.

roots
Numero di elementi ancora considerati radici di possibili cicli. Se 0, non ci sono cicli da analizzare.

application_time
Tempo totale speso dallo script.

collector_time
Tempo impiegato dal GC per analizzare e raccogliere i cicli.

destructor_time
Tempo speso in eventuali distruttori.

free_time
Tempo necessario per liberare la memoria effettivamente raccolta.
</pre>

</body>
</html>



