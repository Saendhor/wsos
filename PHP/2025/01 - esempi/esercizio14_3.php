<?php
// generatore di personaggi D&D

// funzione per tirare 3D6
function tiraDadi3D6()
{
    return rand(1, 6) + rand(1, 6) + rand(1, 6);
}

function generaNomeFantasy()
{
    $iniziali = ["Al", "Bel", "Cor", "Dar", "El", "Fen", "Gal", "Hel", "Ith", "Jar", "Kel", "Lor", "Mor", "Nel", "Or", "Pel", "Qua", "Ryn", "Sel", "Tor", "Ul", "Var", "Wil", "Xan", "Yor", "Zel"];
    $medie = ["a", "e", "i", "o", "u", "ar", "en", "il", "or", "un", "al", "er", "ir", "ur", "an", "el", "ol", "in"];
    $finali = ["dor", "mir", "thas", "riel", "dan", "gorn", "nion", "dras", "thar", "vorn", "dil", "nor", "las", "rian", "thus", "dor", "lin", "mar", "tor", "vash"];

    $nome = $iniziali[array_rand($iniziali)] . (rand(0, 1) ? $medie[array_rand($medie)] : "") . $finali[array_rand($finali)];

    // prima lettera maiuscola
    return ucfirst($nome);
}


$razze = ["Human", "Elf", "Dwarf", "Halfling"];

$classi =
[
    "Barbarian",
    "Bard",
    "Cleric",
    "Druid",
    "Fighter",
    "Monk",
    "Paladin",
    "Ranger",
    "Rogue",
    "Sorcerer",
    "Warlock",
    "Wizard",
];

$origini =
[
    "Acolyte",
    "Charlatan",
    "Criminal",
    "Entertainer",
    "Folk Hero",
    "Guild Artisan",
    "Hermit",
    "Noble",
    "Outlander",
    "Sage",
    "Sailor",
    "Soldier",
    "Urchin",
];


// genera personaggio casuale
$personaggio =
[
    "Nome" => generaNomeFantasy(),
    "Razza" =>  $razze[array_rand($razze)],
    "Classe" =>  $classi[array_rand($classi)],
    "Origine" =>  $origini[array_rand($origini)],
    "Caratteristiche" =>
    [
        "Forza" => tiraDadi3D6(),
        "Destrezza" => tiraDadi3D6(),
        "Costituzione" => tiraDadi3D6(),
        "Intelligenza" => tiraDadi3D6(),
        "Saggezza" => tiraDadi3D6(),
        "Carisma" => tiraDadi3D6(),
    ]
];

// output
echo "<h2>Personaggio Casuale di Dungeons & Dragons</h2>";

echo "<p><strong>Nome:</strong> {$personaggio['Nome']}<br>";
echo "<strong>Razza:</strong> {$personaggio['Razza']}<br>";
echo "<strong>Classe:</strong> {$personaggio['Classe']}<br>";
echo "<strong>Origine:</strong> {$personaggio['Origine']}<br></p>";

echo "\n<table border='1' cellpadding='6' cellspacing='0'>\n";
echo "<tr><th>Caratteristica</th><th>Punteggio</th></tr>";

foreach ($personaggio['Caratteristiche'] as $nome => $valore)
{
    echo "\n<tr><td>$nome</td><td>$valore</td></tr>";
}

echo "\n</table><br>";

echo "<a href='?'>Genera un altro personaggio</a>";
?>



