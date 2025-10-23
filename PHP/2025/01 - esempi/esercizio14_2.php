<?php

// Istant poetry

$soggetti =
[
    "the wind",
    "the moon",
    "the sea",
    "the silence",
    "the night",
    "the time",
    "a dream",
    "the rain",
    "a memory",
    "the shadow",
];

$verbi =
[
    "whispers",
    "awaits",
    "embraceth",
    "fades",
    "lingereth",
    "wanders",
    "remembereth",
    "caresseth",
    "shimmers",
    "sighs",
];

$oggetti =
[
    "the stars",
    "the darkness",
    "a secret truth",
    "the endless void",
    "the sleeping dawn",
    "a forgotten name",
    "the distant echo",
    "the trembling flame",
    "the silent shore",
    "the misty dream",
];

$chiusure =
[
    "and all shall fade away",
    "where shadows breathe",
    "beyond the waking dawn",
    "and none shall remember",
    "within the circle of time",
    "beneath the endless sky",
    "and silence reigns again",
    "where no soul wanders",
    "till stars forget their name",
    "as the night endureth",
];

function creaVerso($soggetti, $verbi, $oggetti, $chiusure)
{
    $verso = ucfirst($soggetti[array_rand($soggetti)]) . " " .
        $verbi[array_rand($verbi)] . " " .
        $oggetti[array_rand($oggetti)];

    // 50% chance chiusura poetica
    if (rand(0, 1))
    {
        $verso .= ", " . $chiusure[array_rand($chiusure)];
    }

    return $verso . ".";
}

define("NUMERO_VERSI", 4);
$poema = [];

for ($i = 0; $i < NUMERO_VERSI; $i++)
{
    $poema[] = creaVerso($soggetti, $verbi, $oggetti, $chiusure);
}

echo "<h2>Poema generato casualmente</h2>";
foreach ($poema as $verso)
{
    echo $verso . "<br>";
}

echo "<a href='?'>Genera un altro poema</a>";
