<!DOCTYPE html>
<html>
<head>
    <title>Exercise: Coin Flip Simulation</title>
</head>
<body>

<?php
// Simulazione di lancio di una moneta

define("NUMERO_LANCI", 100);   // numero totale di lanci da simulare
define("STAMPA_PASSI", 0);     // se impostato a 1 mostra ogni lancio

// Inizializza i contatori
$testa = 0;
$croce = 0;

// Esegui i lanci
for ($lancio = 1; $lancio <= NUMERO_LANCI; $lancio++)
{
    $tiro = rand(0, 1); // 0 = testa, 1 = croce

    if ($tiro == 0)
        $testa++;
    else
        $croce++;

    if (STAMPA_PASSI == 1)
        echo "<br>Lancio $lancio = " . ($tiro == 0 ? "Testa" : "Croce") . "<br>";

    if ($lancio == NUMERO_LANCI || STAMPA_PASSI == 1)
    {
        echo "Testa: ";
        for ($i = 0; $i < $testa; $i++)
        {
            echo "*";
        }
        echo "<br>";

        echo "Croce: ";
        for ($i = 0; $i < $croce; $i++)
        {
            echo "*";
        }
        echo "<br>";
    }
}

echo "<br><strong>Simulazione completata!</strong><br>";
echo "<a href='?'>Rilancia la moneta</a>";
?>

</body>
</html>
