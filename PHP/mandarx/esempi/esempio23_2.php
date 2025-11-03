<!DOCTYPE html>
<html>
<head>
    <title>Dettaglio contatto</title>
</head>
<body>

<?php
    $contatti =
        [
            "rcarter@arkham.org" =>
            [
                "nome" => "Randolph Carter",
                "professione" => "Antiquario",
                "indirizzo" => "Arkham, Massachusetts",
            ],
            "cthulhu@rlyeh.sea" =>
            [
                "nome" => "Cthulhu",
                "professione" => "Antica divinità dormiente",
                "indirizzo" => "R’lyeh, Oceano Pacifico",
            ],
            "rusher@houseofusher.us" =>
            [
                "nome" => "Roderick Usher",
                "professione" => "Artista e gentiluomo decadente",
                "indirizzo" => "Casa Usher, Pennsylvania",
            ],
            "sherlock@221bbakerstreet.co.uk" =>
            [
                "nome" => "Sherlock Holmes",
                "professione" => "Detective privato",
                "indirizzo" => "221B Baker Street, Londra",
            ],
            "jwatson@221bbakerstreet.co.uk" =>
            [
                "nome" => "Dr. John Watson",
                "professione" => "Assistente investigativo",
                "indirizzo" => "221B Baker Street, Londra",
            ],
            "scrooge@scrooge&marley.co.uk" =>
            [
                "nome" => "Ebenezer Scrooge",
                "professione" => "Finanziere",
                "indirizzo" => "Cornhill, Londra",
            ],
        ];

    echo "<h3>Dettaglio contatto:</h3>";

    $email = $_GET['email'] ?? '';

    if (isset($contatti[$email]))
    {
        $dettaglio = $contatti[$email];

        echo "<table border='1' cellpadding='6' cellspacing='0'>";
        echo "<tr><th>Email</th><th>Nome</th><th>Professione</th><th>Indirizzo</th></tr>";
        echo "<tr>";
        echo "<td>$email</td>";
        echo "<td>{$dettaglio['nome']}</td>";
        echo "<td>{$dettaglio['professione']}</td>";
        echo "<td>{$dettaglio['indirizzo']}</td>";
        echo "</tr>";
        echo "</table>";
    }
    else
    {
        echo "<p>Nessun contatto trovato per l’indirizzo email specificato.</p>";
    }

?>

</body>
</html>
