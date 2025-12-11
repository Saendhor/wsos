<?php

require_once "functions/HtmlBuilder.php";

$html = new HtmlBuilder();

$html->addDoctype();
$html->addTagOpen("html", "lang='it'");

// ESEMPIO 1 CHIUSURA TOTALE

$html->addTagOpen("div", "class='example1'");

$html->addTagOpen("h1", "");
$html->addText("Esempio 1: tutti i tag verranno chiusi.");
$html->addBR();

$html->addTagOpen("a", "href='#'");
$html->addText("questo pezzo è un link.");
$html->addBR();

$html->addTagOpen("b", "");
$html->addText("Questo testo è in grassetto ");
$html->addBR();

$html->addTagOpen("i", "");
$html->addText("e questa parte è anche in corsivo ");
$html->addBR();

// chiudo TUTTO
$html->closeOpenTags();


// ESEMPIO 2

$html->addTagOpen("div", "class='example2'");

$html->addTagOpen("h1", "");
$html->addText("Esempio 2: chiudo solo 2 tag.");
$html->addBR();

$html->addTagOpen("a", "href='#'");
$html->addText("questo pezzo è un link.");
$html->addBR();

// chiudo SOLO gli ultimi 2
$html->closeOpenTags(2);

$html->addTagOpen("b", "");
$html->addText("Questo testo è in grassetto ");
$html->addBR();

$html->addTagOpen("i", "");
$html->addText("e questa parte è anche in corsivo ");
$html->addBR();

// chiudo TUTTO
$html->closeOpenTags();

// ESEMPIO 3 CHIUDO SOLO 1 TAG

$html->addTagOpen("div", "class='example3'");

$html->addTagOpen("h1", "");
$html->addText("Esempio 3: chiudo solo 1 tag.");
$html->addBR();

$html->addTagOpen("a", "href='#'");
$html->addText("questo pezzo è un link.");
$html->addBR();

// chiudo SOLO 1
$html->closeOpenTags(1);


$html->addTagOpen("b", "");
$html->addText("Questo testo è in grassetto ");
$html->addBR();

$html->addTagOpen("i", "");
$html->addText("e questa parte è anche in corsivo ");
$html->addBR();

// chiudo TUTTO
$html->closeOpenTags();


// CHIUSURA HTML
$html->addTagClose("html");

echo $html->getHtmlGeneric();

?>
