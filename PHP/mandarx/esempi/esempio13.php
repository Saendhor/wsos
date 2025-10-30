<?php
    declare (strict_types = 0);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Functions</title>
</head>
<body>

<?php
    // Funzione semplice
    echo "<h3>Funzione semplice</h3>";

    function myMessage()
    {
        echo "Hello world!<br>";
    }

    // Chiamata della funzione
    myMessage();

    // Funzione con un argomento
    echo "<h3>Funzione con un argomento</h3>";

    function familyName($fname)
    {
        echo "$fname Smith.<br>";
    }

    // Chiamate con argomenti diversi
    familyName("Helen");
    familyName("Kai Jim");
    familyName("Borge");

    // Funzione con due argomenti
    echo "<h3>Funzione con due argomenti</h3>";

    function familyName2($fname, $year)
    {
        echo "$fname Smith. Born in $year <br>";
    }

    familyName2("John", "1975");
    familyName2("Alex", "1978");
    familyName2("Kai Jim", "1983");

    // Valore predefinito del parametro
    echo "<h3>Valore predefinito del parametro</h3>";

    function setHeight($defaultHeight = 50)
    {
        echo "The height is : $defaultHeight <br>";
    }

    // Chiamate: alcune con valore, altre con valore di default
    setHeight(35);
    setHeight();
    setHeight(135);
    setHeight(80);

    // Funzione con valore di ritorno
    echo "<h3>Funzione con valore di ritorno</h3>";

    function sum($x, $y)
    {
        $z = $x + $y;
        return $z;
    }

    echo "5 + 10 = " . sum(5, 10) . "<br>";
    echo "7 + 13 = " . sum(7, 13) . "<br>";
    echo "2 + 4 = " . sum(2, 4) . "<br>";

    // Passaggio per riferimento
    echo "<h3>Passaggio per riferimento</h3>";

    function add_five(&$value)
    {
        $value += 5;
    }

    $num = 2;
    echo "Valore prima della funzione: $num<br>";
    add_five($num);
    echo "Valore dopo la funzione: $num<br>";

    // Parametro variadico
    echo "<h3>Parametro variadico</h3>";

    function sumMyNumbers(...$x)
    {
        $n = 0;
        $len = count($x);
        for ($i = 0; $i < $len; $i++)
        {
            $n += $x[$i];
        }
        return $n;
    }

    $a = sumMyNumbers(5, 2, 6, 2, 7, 7);
    echo "Somma totale: $a<br>";

    // Parametro variadico con parametro normale
    echo "<h3>Parametro variadico con parametro normale</h3>";

    function myFamily($lastname, ...$firstname)
    {
        $txt = "";
        $len = count($firstname);
        for ($i = 0; $i < $len; $i++)
        {
            $txt .= "Hi, $firstname[$i] $lastname.<br>";
        }
        return $txt;
    }

    $a = myFamily("Doe", "Jane", "John", "Joey");
    echo $a;

    // Tipizzazione (provare con e senza strict)
    //scrivere come prima istruzione: declare (strict_types = 1); // strict requirement
    echo "<h3>Tipizzazione (con e senza strict)</h3>";

    // Senza strict "3 days" viene convertito automaticamente in int(3)
    function addNumbers(int $a, int $b): int
    {
        return $a + $b;
    }
    echo "Risultato: " . addNumbers(5, 3) . "<br>";
    echo "Risultato: " . addNumbers(5, "3 days") . "<br>"; //errore

?>

</body>
</html>
