<?php

require_once "functions/HTMLBodyBuilder.php";

$html = new HTMLBodyBuilder();

// attributi <html>
$html->setHTMLAttrs("lang='it'");

// titolo
$html->setTitle("Philip K. Dick");

// meta
$html->addMeta("charset='UTF-8'");

// css: sfondo + card trasparente + testo elegante
$html->addStyle
("
    body {
        margin: 0;
        padding: 40px;
        font-family: Georgia, serif;
        color: #f0f0f0;

        background-image: url('imgs/pkd.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .overlay {
        background: rgba(0, 0, 0, 0.68);
        border-radius: 12px;
        padding: 30px;
        max-width: 900px;
        margin: auto;
        backdrop-filter: blur(2px);
        box-shadow: 0 0 25px #000;
    }

    h1 {
        color: #ffe28a;
        text-shadow: 0 0 14px #000;
        margin-top: 0;
    }

    h2 {
        color: #96d8ff;
        text-shadow: 0 0 10px #000;
        margin-top: 35px;
    }

    p {
        line-height: 1.7;
    }

    ul li {
        margin: 8px 0;
    }

    a {
        color: #7CFF91;
        font-weight: bold;
        text-decoration: none;
        text-shadow: 0 0 6px #003300;
    }

    a:hover {
        color: #FFEA6A;
        text-shadow: 0 0 8px #ffdd55;
    }
");


// body
$html->setBodyAttrs("");
$html->createBody();

// apertura overlay
$html->addToBody("<div class='overlay'>");

// titolo
$html->addHToBody(1, "Philip K. Dick");

// paragrafo descrittivo
$html->addPToBody
(
    "Philip Kindred Dick (1928-1982) è stato uno degli autori più influenti della 
     fantascienza del XX secolo. Le sue opere esplorano temi come l'identità, la natura 
     della realtà, il controllo sociale e la paranoia, anticipando molti concetti oggi 
     presenti nella cultura cyberpunk."
);

// seconda descrizione
$html->addPToBody
(
    "Molti suoi romanzi sono diventati film celebri, come "
);

$html->addAToBody("Blade Runner", "https://it.wikipedia.org/wiki/Blade_Runner", "target='_blank'");
$html->addAToBody("Total Recall", "https://it.wikipedia.org/wiki/Atto_di_forza", "target='_blank'");
$html->addAToBody("Minority Report", "https://it.wikipedia.org/wiki/Minority_Report", "target='_blank'");
$html->addAToBody("A Scanner Darkly", "https://it.wikipedia.org/wiki/A_Scanner_Darkly_-_Un_oscuro_scrutare", "target='_blank'");
$html->addAToBody("Impostor", "https://it.wikipedia.org/wiki/Impostor", "target='_blank'");
$html->addBRToBody();

$html->addPToBody
(
    "Le sue storie presentano mondi distorti dove la percezione della realtà è incerta e spesso manipolata."
);

// caratteristiche principali
$html->addHToBody(2, "Temi ricorrenti nelle sue opere");

$html->addUlOpenToBody();
$html->addLiToBody("Identità e alienazione");
$html->addLiToBody("Realtà alternative e universi simulati");
$html->addLiToBody("Controllo sociale, autorità e sorveglianza");
$html->addLiToBody("Tecnologia come strumento di manipolazione");
$html->addLiToBody("Sospetto, paranoia e senso di instabilità");
$html->addUlCloseToBody();

// chiusura overlay
$html->addToBody("</div>");

// creazione HTML completo
$html->createHTML();

// output
echo $html->getHtml();

?>
