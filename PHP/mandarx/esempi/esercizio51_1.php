<?php

require_once "functions/HtmlGenerator.php";

$html = new HtmlGenerator();

$html->printDoctype();

$html->printTagOpen("html", "lang='it'");

    // head
    $html->printTagOpen("head", "");

        $html->printTagVoid("meta", "charset='UTF-8'");
        $html->printTag("title", "", "Pagina di test");
        $html->printTag("style", "", "body { font-family: Arial; background-color: #f0f0f0; }");

    $html->printTagClose("head");

    // body
    $html->printTagOpen("body", "");
        $html->printTagOpen("div", "class='wrapper'");
            $html->printTag("h1", "", "Titolo principale");
            $html->printTagVoid("img", "src='imgs/html.png' alt='immagine' style='width:50px; height:auto;'");
            $html->printTag("p", "", "Questo è un paragrafo di esempio generato con la classe HtmlGenerator.");
        $html->printTagClose("div");

        $html->printTagOpen("section", "id='seconda-sezione'");
            $html->printTag("h2", "", "Seconda sezione");
            $html->printTag("p", "", "Il programmatore ha sempre responsabilità di mantenere l'ordine dei tag.");
        $html->printTagClose("section");

    $html->printTagClose("body");

$html->printTagClose("html");
