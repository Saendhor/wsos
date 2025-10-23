<!DOCTYPE html>
<html>
<head>
    <title>Conditions</title>
</head>
<body>

<?php
    // Ottiene l’ora corrente in formato 24 ore
    $t = date("H");

    // if...else
    if ($t < "20")
    {
        echo "Have a good day!<br>";
    }
    else
    {
        echo "Have a good night!<br>";
    }

    // if...elseif...else
    if ($t < "10")
    {
        echo "Have a good morning!<br>";
    }
    elseif ($t < "20")
    {
        echo "Have a good day!<br>";
    }
    else
    {
        echo "Have a good night!<br>";
    }

    $a = 3;
    // sintassi alternativa
    if ($a == 5):
        echo "a equals 5<br>";
        echo "...";
    elseif ($a == 6):
        echo "a equals 6<br>";
        echo "!!!";
    else:
        echo "a is neither 5 nor 6<br>";
    endif;


    // switch
    $favcolor = "red";

    switch ($favcolor)
    {
        case "red":
            echo "Your favorite color is red!<br>";
            break;
        case "blue":
            echo "Your favorite color is blue!<br>";
            break;
        case "green":
            echo "Your favorite color is green!<br>";
            break;
        // se nessun caso corrisponde, viene eseguito default
        default:
            echo "Your favorite color is neither red, blue, nor green!<br>";
    }
?>

</body>
</html>
