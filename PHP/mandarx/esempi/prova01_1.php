<?php

require("../Private/credentials.php");
require("functions/connessione.php");

$conn = connect($servername, $username, $password, $dbname);

define('RESET', 0);

if(RESET)
{
    $sql = "DROP TABLE eventi;";
    $conn->query($sql);
    exit;
}


echo <<<HTML
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <title>prova01_1 - creazione tabella eventi</title>
</head>
<body>
    <h1>Prova 01 - Gestione eventi</h1>


    <h2>Data la tabella <i>eventi</i> creata e popolata da questo file</h2>
    <pre>
+--------------+-------------+------+-----+---------+----------------+
| Field        | Type        | Null | Key | Default | Extra          |
+--------------+-------------+------+-----+---------+----------------+
| id           | int         | NO   | PRI | NULL    | auto_increment |
| titolo       | varchar(60) | NO   |     | NULL    |                |
| yyyymmddhhmm | char(12)    | NO   |     | NULL    |                |
| luogo        | varchar(40) | NO   |     | NULL    |                |
| partecipanti | int         | NO   |     | 0       |                |
+--------------+-------------+------+-----+---------+----------------+
    </pre>

    <h2>Scrivere una o più pagine in PHP che:</h2>
    <ol>
        <li>
            Mostrino l'evento con data futura pi&ugrave; vicina alla data e ora corrente.
            (Suggerimento: <b><code>date('YmdHi')</code></b>)
        </li>
        <li>
            CRUD completo sulla tabella.
        </li>
        <li>
            BONUS:
            <ol type="a">
                <li>Stampare la top 3 dei luoghi pi&ugrave; frequenti.</li>
                <li>Stampare l'evento passato con pi&ugrave; partecipanti.</li>
            </ol>
        </li>
    </ol>
HTML;

$sql = "CREATE TABLE eventi(id INT AUTO_INCREMENT PRIMARY KEY, titolo VARCHAR(60) NOT NULL, yyyymmddhhmm CHAR(12) NOT NULL, luogo VARCHAR(40) NOT NULL, partecipanti INT NOT NULL DEFAULT 0);";

if ($conn->query($sql) === TRUE)
{
    echo "Tabella eventi creata.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}


$sql = "INSERT INTO eventi (titolo, yyyymmddhhmm, luogo, partecipanti) VALUES
('Concerto1', '202503151930', 'Stadio', 35000),
('Spettacolo Teatrale Il Gatto con gli stivali', '202502282100', 'Teatro', 1285),
('Incontro di Basket', '202512101700', 'Palazzetto dello Sport', 3000),
('Seminario su AI e Futuro Digitale','202511051000', 'Aula Magna', 45),
('Concerto Jazz Notturno', '202511222130', 'Teatro', 110),
('Torneo di Scacchi', '202512221500', 'Biblioteca Civica', 40),
('Stand-up Comedy Night', '202604051930', 'Pub', 700),
('Maratona di Primavera', '202605190800', 'Piazza', 5000),
('Seminario Cybersecurity', '202603221100', 'Sala Conferenze A', 155),
('Festival del Cinema', '202606012000', 'Cinema', 560),
('Concerto2', '202505151930', 'Stadio', 18000),
('Rassegna di Cortometraggi', '202504091930', 'Cinema', 320),
('Teatro: Il Fantasma dell\'Opera', '202603221830', 'Teatro', 980),
('Fiera delle Tecnologie', '202607021000', 'Palazzetto dello Sport', 4200),
('Jazz & Wine Night', '202606122130', 'Pub', 450),
('Mostra Fotografica', '202603011100', 'Biblioteca Civica', 120),
('Conferenza Ecologia Urbana', '202603141600', 'Aula Magna', 200),
('Maratona di Beneficenza', '202604200900', 'Piazza', 7000),
('Teatro Sperimentale: Voci', '202602101900', 'Teatro', 650)";


if ($conn->query($sql) === TRUE)
{
    echo "Eventi creati correttamente.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}


?>