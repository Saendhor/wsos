<!DOCTYPE html>
<html>
<head>
    <title>Exercise: Dice Roll Simulation</title>
</head>
<body>

<?php
// Simulazione di lancio di dadi con istogramma

define("NUMERO_DADI", 5);       // quanti dadi si lanciano per volta
define("FACCE_DADO", 4);        // numero di facce di ogni dado
define("NUMERO_LANCI", 100);     // numero totale di lanci da simulare
define("STAMPA_PASSI", 0);

echo "<h3>Lancio " . NUMERO_LANCI . " volte " . NUMERO_DADI . " dadi a " . FACCE_DADO . " facce</h3>";
// Inizializza un array per contare le frequenze delle somme
$frequenze = [];
$minSomma = NUMERO_DADI;                 // somma minima possibile
$maxSomma = NUMERO_DADI * FACCE_DADO;    // somma massima possibile

for ($i = $minSomma; $i <= $maxSomma; $i++)
{
    $frequenze[$i] = 0;
}

// Esegui i lanci
for ($lancio = 1; $lancio <= NUMERO_LANCI; $lancio++)
{
    $somma = 0;
    for ($d = 1; $d <= NUMERO_DADI; $d++)
    {
        $tiro = rand(1, FACCE_DADO);
        $somma += $tiro;
    }

    $frequenze[$somma]++;

    // Mostra stato aggiornato
    if(STAMPA_PASSI == 1)
        echo "<br>Lancio $lancio = $somma<br>";

    if($lancio == NUMERO_LANCI || STAMPA_PASSI == 1)
    {
        for ($numero = $minSomma; $numero <= $maxSomma; $numero++)
        {
            echo "$numero:";

            for ($i = 0; $i < $frequenze[$numero]; $i++)
            {
                echo "*";
            }
            echo "<br>";
        }
    }
}
echo "<br><strong>Simulazione completata!</strong><br>";
echo "<a href='?'>Rilancia i dadi</a>";
?>

</body>
</html>
