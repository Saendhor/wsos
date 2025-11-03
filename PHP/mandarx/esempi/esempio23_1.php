<!DOCTYPE html>
<html>
<head>
    <title>urlencode not enabled</title>
</head>
<body>
    <h3>Indirizzi email:</h3>

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


        foreach ($contatti as $key => $value)
        {    
            echo '<a href="esempio23_2.php?email=' . $key . '">' . $key . '</a> (' . $value['nome'] . ')<br>';
        }
    ?>
</body>
</html>

