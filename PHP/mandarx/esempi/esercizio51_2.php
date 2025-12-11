<?php

require_once "functions/HtmlGenerator.php";

$html = new HtmlGenerator();

$html->addDoctype();
$html->addTagOpen("html", "lang='en'");

$html->addTagOpen("head", "");
$html->addTagVoid("meta", "charset='UTF-8'");
$html->addTag("title", "", "Dimostrazione addTag (versione 2)");
$html->addTag(
    "style",
    "",
    "
        body { 
            font-family: Arial; 
            background-color:#ffffff; 
            color:#222; 
            padding:20px;
        }
        .box {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            background:#fafafa;
        }
        img {
            max-width: 30%;
            height: auto;
            display: block;
            margin: 15px 0;
        }
    "
);
$html->addTagClose("head");

$html->addTagOpen("body", "");

$html->addTagOpen("div", "class='box'");
$html->addTag("h1", "", "Programmazione a Oggetti");
$html->addTag("p", "", "Altro esempio. Questa volta usando i metodi addTagOpen e addTagClose.");
$html->addTagVoid
(
    "img",
    "src='imgs/oop.svg' alt='OOP Diagramma' style='width:12%; height:auto;'"
);
$html->addTag("p", "", "immagine.");
$html->addTagClose("div");

$html->addTagOpen("section", "class='box'");
$html->addTag("h2", "", "Seconda sezione dell'esempio");
$html->addTag("p", "", "La responsabilità della corretta apertura e chiusura dei tag rimane al programmatore.");
$html->addTagClose("section");

$html->addTagClose("body");
$html->addTagClose("html");

echo $html->getHtmlGeneric();

?>
