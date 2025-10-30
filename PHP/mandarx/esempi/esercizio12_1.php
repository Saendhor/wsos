<!DOCTYPE html>
<html>
<head>
    <title>Exercise: Guess the number</title>
</head>
<body>

<?php
// GIOCO: INDOVINA IL NUMERO

// Costanti e setup iniziale
define("MIN_NUMERO", 1);
define("MAX_NUMERO", 100);
define("MAX_TENTATIVI", 10);

$numeroSegreto = rand(MIN_NUMERO, MAX_NUMERO);
$tentativi = MAX_TENTATIVI;
$min = MIN_NUMERO;
$max = MAX_NUMERO;

// Giocatore automatico (il computer gioca contro se stesso)
echo "Pssst. Numero segreto = $numeroSegreto!<br>";

while ($tentativi > 0)
{
    echo "<br>Tentativi rimasti = $tentativi<br>";
    $ipotesi = rand($min, $max);
    echo "Penso a un numero tra $min e $max<br>";
    echo "$ipotesi?<br>";

    $tentativi--;

    if ($ipotesi == $numeroSegreto)
    {
        echo "Hai indovinato!<br>";
        $tentativi = -1;
        break;
    }
    else
    {
        if ($ipotesi < $numeroSegreto)
        {
            echo "Troppo basso!<br>";
            $min = $ipotesi + 1;
        }
        else
        {
            echo "Troppo alto!<br>";
            $max = $ipotesi - 1;
        }
    }
}

if($tentativi==0)
    echo "Non hai indovinato!<br>";


echo "Game over! <a href=\"esercizio12_1.php\">Riprova</a>";
?>

</body>
</html>
