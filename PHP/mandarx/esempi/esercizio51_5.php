<?php

require_once "functions/HtmlGenerator.php";

$html = new HtmlGenerator();

// attributi <html>
$html->setHTMLAttrs("lang='it'");

// titolo
$html->setTitle("ZX Spectrum");

// meta
$html->addMeta("charset='UTF-8'");

// css stile retro ZX Spectrum
$html->addStyle
("
    body {
        background: #000000;
        margin: 0;
        padding: 30px;
        font-family: 'Courier New', monospace;
        color: #e6e6e6;
    }

    .card {
        background: #111111;
        border-radius: 10px;
        border: 2px solid #333333;
        padding: 25px;
        max-width: 800px;
        margin: 0 auto;
        box-shadow: 0 0 15px #0080ff55;
    }

    h1 {
        color: #00e0ff;
        text-shadow: 0 0 10px #00e0ff;
        margin-bottom: 10px;
    }

    h2 {
        color: #ffcc00;
        text-shadow: 0 0 8px #ffcc00;
        margin-top: 25px;
    }

    img {
        width: 25%;
        height: auto;
        display: block;
        margin: 18px 0;
        border-radius: 3px;
        border: 2px solid #444;
        box-shadow: 0 0 10px #444;
    }

    p {
        background: #1a1a1a;
        padding: 12px;
        border-left: 4px solid #00e0ff;
        margin-bottom: 15px;
    }

    ul {
        background: #1a1a1a;
        padding: 15px;
        border-left: 4px solid #ff0040;
    }

    ul li {
        margin: 6px 0;
        color: #b7b7b7;
    }
");

// body
$html->setBodyAttrs("");
$html->createBody();

// contenuto
$html->addToBody("<div class='card'>");

$html->addTagToBody("h1", "", "ZX Spectrum");

// immagine
$html->addTagToBody
(
    "img",
    "src='imgs/ZXSpectrum48k.jpg' alt='ZX Spectrum'",
    "",
    false
);

// descrizione breve
$html->addTagToBody
(
    "p",
    "",
    "Lo ZX Spectrum è un home computer prodotto dalla Sinclair Research e introdotto nel 1982. 
     Ha avuto un ruolo fondamentale nella diffusione dell’informatica domestica in Europa, 
     diventando uno dei modelli più iconici dell’epoca."
);

$html->addTagToBody
(
    "p",
    "",
    "Il sistema era apprezzato per il prezzo contenuto, la grafica a colori e la vasta libreria
     di software, specialmente videogiochi, che lo hanno reso un punto di riferimento per la 
     scena videoludica casalinga degli anni ’80."
);

// sezione caratteristiche
$html->addTagToBody("h2", "", "Caratteristiche principali");

// lista caratteristiche
$html->addTagToBody("ul", "", "", true);
    $html->addTagToBody("li", "", "CPU Zilog Z80A a 3.5 MHz");
    $html->addTagToBody("li", "", "Memoria: 16 KB o 48 KB a seconda del modello");
    $html->addTagToBody("li", "", "Grafica a colori con attributi per blocco 8x8");
    $html->addTagToBody("li", "", "Supporto a cassette per il caricamento dei programmi");
    $html->addTagToBody("li", "", "Catalogo molto vasto di videogiochi e software");
$html->addToBody("</ul>");

$html->addTagToBody("h2", "", "Knight Lore");

$html->addTagToBody
(
    "p",
    "",
    "Un titolo fondamentale nella storia dei videogiochi è Knight Lore, sviluppato da Ultimate Play the Game e pubblicato nel 1984. 
     È considerato il primo videogioco a rendere davvero popolare la grafica isometrica grazie al famoso Filmation Engine. 
     La sua presentazione tecnica era talmente avanzata rispetto agli standard dell’epoca da sembrare proveniente da un computer di nuova generazione."
);

$html->addTagToBody
(
    "img",
    "src='imgs/knight-lore.jpg' alt='Knight Lore'",
    "",
    false
);


// chiusura card
$html->addToBody("</div>");

// creazione HTML
$html->createHTML();

// output finale
echo $html->getHtml();

?>
