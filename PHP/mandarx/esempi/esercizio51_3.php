<?php

require_once "functions/HtmlBuilder.php";

$html = new HtmlBuilder();

// inizio documento
$html->addDoctype();
$html->addTagOpen("html", "lang='it'");

    // head
    $html->addTagOpen("head", "");

        // meta, title e style tramite le funzioni specializzate
        $html->addMetaCharset();
        $html->addTitle("Esempio HTMLBuilder");

        $html->addStyle
        ("
            body {
                font-family: Arial;
                background-color: #eef2f7;
                padding: 25px;
            }
            .box {
                background: white;
                border: 1px solid #bbb;
                border-radius: 10px;
                padding: 18px;
                margin-bottom: 20px;
            }
            img {
                display: block;
                margin: 12px 0;
            }
            table {
                border-collapse: collapse;
                margin-top: 10px;
            }
            td, th {
                border: 1px solid #999;
                padding: 6px 10px;
                background: #fafafa;
            }
            a {
                color: #003bb3;
                text-decoration: none;
                font-weight: bold;
            }
            a:hover {
                text-decoration: underline;
            }
        ");

    $html->addTagClose("head");

    // body
    $html->addTagOpen("body", "");

        // box 1
        $html->addTagOpen("div", "class='box'");

            $html->addH(1, "Pagina");
            $html->addP("Questa pagina è stata composta utilizzando funzioni che costruiscono i tag HTML in modo controllato.");

            // immagine usando la funzione specializzata
            $html->addImg
            (
                "imgs/PHPLogo.png",
                "alt='Logo PHP' style='width:10%; height:auto;'"
            );

        $html->addTagClose("div");

        // box 2 con tabella
        $html->addTagOpen("div", "class='box'");

            $html->addH(2, "Tabella di esempio");
            $html->addP("Di seguito una tabella che riporta alcuni linguaggi di programmazione e l'anno di creazione:");

            $html->addTableOpen();

                // intestazione
                $html->addTrOpen();
                    $html->addTd("Linguaggio", "style='font-weight:bold; background:#ddd;'");
                    $html->addTd("Anno", "style='font-weight:bold; background:#ddd;'");
                $html->addTrClose();

                // righe tabella
                $html->addTrOpen();
                    $html->addTd("BASIC");
                    $html->addTd("1964");
                $html->addTrClose();

                $html->addTrOpen();
                    $html->addTd("C");
                    $html->addTd("1972");
                $html->addTrClose();
                
                $html->addTrOpen();
                    $html->addTd("Objective-C");
                    $html->addTd("1984");
                $html->addTrClose();

                $html->addTrOpen();
                    $html->addTd("C++");
                    $html->addTd("1985");
                $html->addTrClose();

                $html->addTrOpen();
                    $html->addTd("Python");
                    $html->addTd("1991");
                $html->addTrClose();

                $html->addTrOpen();
                    $html->addTd("PHP");
                    $html->addTd("1995");
                $html->addTrClose();

                $html->addTrOpen();
                    $html->addTd("C#");
                    $html->addTd("2000");
                $html->addTrClose();

            $html->addTableClose();

            // link tramite la funzione specializzata
            $html->addP("Per maggiori informazioni sui linguaggi di programmazione:");
            $html->addA("Visita Wikipedia", "https://it.wikipedia.org/wiki/Linguaggio_di_programmazione", "target='_blank'");

        $html->addTagClose("div");

    // chiusura body e html
    $html->addTagClose("body");
    $html->addTagClose("html");

// output finale
echo $html->getHtmlGeneric();

?>
