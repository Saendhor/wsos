<?php

define('DEBUG', 0);

require("../Private/credentials.php");
require("functions/connessione.php");
require("esercitazione01_funzione.php");

$conn = connect($servername, $username, $password, $dbname);


//test
$sql = "SELECT * FROM recipes;";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0)
{
    while ($row = $result->fetch_assoc())
    {
        $livelli = calcolaLivelli($row['descrizione'], $tecniche);

        echo "ID: " . $row['id'] . "<br>";
        echo "Titolo: " . $row['titolo'] . "<br>";
        echo "Tempo stimato: " . $livelli['tempo'] . "<br>";
        echo "Difficoltà stimata: " . $livelli['difficolta'] . "<br><br>";

        if (DEBUG === 1)
        {
            echo "<pre>";
            echo "STEM TROVATI: " . implode(", ", $livelli['trovati']) . "\n";
            echo "TEMPO RAW: " . $livelli['tempo_raw'] . "\n";
            echo "TEMPO %: " . $livelli['tempo_percent'] . "\n";
            echo "MAX TEC RAW: " . $livelli['maxTec_raw'] . "\n";
            echo "</pre>";
        }
    }
}
else
{
    echo "Nessuna ricetta trovata.";
}

$conn->close();


?>