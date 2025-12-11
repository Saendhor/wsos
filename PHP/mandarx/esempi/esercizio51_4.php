<?php

require_once "functions/HtmlPrinter.php";

$html = new HTMLPrinter();

// doctype + apertura html
$html->printDoctype();
$html->printTagOpen("html", "lang='it'");

// head
$html->printTagOpen("head", "");

$html->printMetaCharset("UTF-8");
$html->printTitle("Scheda del gatto domestico");

$html->printStyle
("
    body {
        font-family: Arial, sans-serif;
        background: #f6f6f6;
        margin: 20px;
        line-height: 1.6;
    }
    h1 {
        color: #333;
        margin-bottom: 10px;
    }
    img {
        display: block;
        margin: 15px 0;
        border-radius: 6px;
    }
    .box {
        background: #fff;
        padding: 15px 20px;
        border-radius: 8px;
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }
    h2 {
        margin-top: 20px;
        color: #444;
    }
    ul {
        margin-top: 10px;
    }
    ul li {
        margin-bottom: 6px;
    }
");

$html->printTagClose("head");

// body
$html->printTagOpen("body", "");

// box principale
$html->printTagOpen("div", "class='box'");

$html->printH(1, "Gatto domestico - Felis silvestris catus");

$html->printImg
(
    "imgs/gatto.jpg",
    "alt='Immagine gatto' style='width:200px; height:auto;'"
);

$html->printP("Il gatto domestico è un piccolo mammifero carnivoro appartenente alla famiglia dei felidi. È noto per la sua agilità, i sensi sviluppati e il comportamento territoriale e crepuscolare.");

$html->printP("Predatore naturale di roditori e uccelli, il gatto utilizza vocalizzazioni, fusa, posture e feromoni per comunicare. Molte delle sue abitudini lo rendono un animale adattabile alla convivenza con l'uomo.");

$html->printH(2, "Caratteristiche principali");

$html->printUlOpen();
$html->printLi("Corpo agile, flessibile, artigli retrattili e ottima vista notturna");
$html->printLi("Predatore di piccoli animali, soprattutto roditori");
$html->printLi("Comunica con vocalizzi, fusa e linguaggio corporeo");
$html->printLi("Molte razze domestiche, mantelli e colori diversi");
$html->printUlClose();

// chiusura box
$html->printTagClose("div");

$html->printText("Per approfondire, consulta: ");
$html->printA("Wikipedia", "https://it.wikipedia.org/wiki/Felis_silvestris_catus", "target='_blank'");


// chiusura body + html
$html->printTagClose("body");
$html->printTagClose("html");

?>
