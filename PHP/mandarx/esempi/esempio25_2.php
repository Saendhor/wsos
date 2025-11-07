<?php
$tipo = $_GET['tipo'] ?? 'html';

// i comandi header() devono venire prima di qualsiasi output
switch ($tipo)
{
    case 'pdf':
        header("Content-Type: application/pdf");
        echo "Questo simula l'invio di un file PDF.";
        break;

    case '404':
        header("HTTP/1.1 404 Not Found");
        //echo "Errore 404: pagina non trovata.";
        break;

    case '500':
        header("HTTP/1.1 500 Internal Server Error");
        //echo "Errore 500: errore interno del server.";
        break;

    case '302':
        $url = $_GET['url'] ?? '';
        if (!empty($url))
        {
            header("Location: $url");
            header("HTTP/1.1 302 Found");
        }
        else
        {
            echo "Nessun URL specificato per il redirect.";
        }
        break;

    default:
        header("Content-Type: text/html");
        echo "<!DOCTYPE html>
              <html>
                <head>
                    <title>Header</title>
                </head>
                <body>
                    <h2>Risposta HTML normale</h2>
                </body>
              </html>";
}
?>
