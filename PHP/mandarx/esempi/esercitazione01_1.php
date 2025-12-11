<?php

require("../Private/credentials.php");
require("functions/connessione.php");

$conn = connect($servername, $username, $password, $dbname);

define('RESET', 0);

if(RESET)
{
    $sql = "DROP TABLE chef;";
    $conn->query($sql);
    $sql = "DROP TABLE recipes;";
    $conn->query($sql);

    exit;
}


$sql = "CREATE TABLE chef(id INT PRIMARY KEY AUTO_INCREMENT,nome VARCHAR(40) NOT NULL);";

if ($conn->query($sql) === TRUE)
{
    echo "Tabella chef creata.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}


$sql = "INSERT INTO chef (nome) VALUES('Gianni Sapore'),('Lucia Aromi'),('Marco Fornelli'),('Davide Speziata'),('Paolo Mestolo'),('Sara Pentola'),('Renato Tegame'),('Clara Dolci'),('Vittorio Griglia'),('Franco Marinata');";

if ($conn->query($sql) === TRUE)
{
    echo "Chef inseriti correttamente.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "CREATE TABLE recipes(id INT PRIMARY KEY AUTO_INCREMENT,titolo VARCHAR(50) NOT NULL,ingredienti TEXT NOT NULL, descrizione TEXT NOT NULL, tempo VARCHAR(10) DEFAULT NULL, difficolta VARCHAR(10) DEFAULT NULL, chef_id INT NOT NULL);";

if ($conn->query($sql) === TRUE)
{
    echo "Tabella recipes creata.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Merluzzo in umido',
'800 g cuori di merluzzo; 250 g salsa di pomodoro; 1 cucchiaino capperi; 10 olive nere; olio extra vergine; 1 spicchio d’aglio; sale; pepe bianco; prezzemolo; mezzo bicchiere vino bianco',
'Trita mezzo aglio. Scalda olio in padella e aggiungi l’aglio. Rosola il merluzzo un minuto per lato e sfuma col vino bianco. Aggiungi capperi dissalati, salsa di pomodoro e olive. Versa una tazzina d’acqua, aggiusta sale e pepe, chiudi col coperchio e cuoci 10 minuti a fuoco dolce. Spegni e completa con prezzemolo tritato.',
1
);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Spaghetti alle Vongole',
'400 g spaghetti; 1 kg vongole; 2 spicchi d’aglio; peperoncino (opzionale); olio extra vergine; sale; prezzemolo',
'Dopo aver spurgato le vongole, mettile in padella con olio e uno spicchio d’aglio e falla aprire a fuoco alto. Filtra il brodo e tienilo da parte. Sguscia metà delle vongole. In un’altra padella scalda olio con aglio schiacciato, aggiungi peperoncino, vongole e brodo filtrato. Cuoci gli spaghetti al dente, aggiungi acqua di cottura emulsionata con olio e spadella tutto per ottenere un sughetto cremoso.',
2
);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Scarpaccia di Camaiore',
'750 g zucchine; 130 g farina tipo 1; 40 g farina di mais fine; 10 fiori di zucca; 1 cipolla; olio extra vergine; sale; pepe nero; rosmarino fresco',
'Affetta zucchine e cipolla, taglia i fiori di zucca e metti tutto in una ciotola. Condisci con sale e pepe e massaggia per alcuni minuti, poi lascia riposare due ore conservando l’acqua rilasciata. Prepara una pastella con l’acqua di vegetazione e le farine, unisci il composto e mescola con un filo d’olio. Versa in teglia oliata, aggiungi rosmarino e olio, quindi cuoci in forno a 220°C fino a doratura.',
3
);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Polpette di merluzzo e patate',
'800 g merluzzo; 4 patate medie; 1 uovo; 1/4 spicchio d’aglio; 2 cucchiai pangrattato; prezzemolo; olio di arachidi; sale; pepe',
'Lessa le patate, falle raffreddare e schiacciale. Cuoci il merluzzo al vapore per 7 minuti e sminuzzalo con una forchetta. Unisci patate, pesce, uovo e aglio, poi amalgama con le mani. Aggiungi pangrattato fino a ottenere un impasto morbido ma non appiccicoso. Forma polpette schiacciate, passale nel pangrattato e friggile in olio caldo.',
4
);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Anelletti al forno alla palermitana',
'500 g anelletti; ragù con 500 g macinato misto; 150 g formaggio caciocavallo o tuma o primosale; 1 melanzana fritta; 2 uova sode; pangrattato; 100 g parmigiano o caciocavallo ragusano; burro o olio per la teglia',
'Lessa gli anelletti molto al dente, sciacquali e condiscili con metà del ragù e metà del formaggio grattugiato. Imburra o olia la teglia e cospargi pangrattato, poi versa metà degli anelletti e compatta. Aggiungi formaggio a fette, uova sode, melanzane fritte e altro ragù. Copri con gli anelletti rimasti, aggiungi altro ragù, formaggio e pangrattato. Cuoci a 180°C per 20 minuti coperto, poi altri 15-20 minuti scoperto finché dorato.',
5
);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Castagne in friggitrice ad aria',
'Castagne; acqua',
'Incidi le castagne tagliando anche la pellicina interna. Metti in ammollo un’ora oppure sbollenta per 3-4 minuti per facilitarne la sbucciatura. Disponile nel cestello con il taglio verso l’alto e cuoci in friggitrice ad aria a 200°C per 15-18 minuti in base alla loro dimensione.',
6
);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Finger Food con patate e carciofi',
'1 kg patate piccole; 5 carciofi; 150 g prosciutto crudo; 150 g prosciutto cotto alla brace; 100 g salmone affumicato; olio di semi di mais; sale; mezzo limone',
'Sbuccia le patate, lavale e affettale sottili. Pulisci i carciofi, togli le foglie esterne e la barbetta, passali con il limone e affettali. Friggi prima le patate e poi i carciofi, scolali su carta assorbente e sala. Assembla piccole torrette con 3 fettine fritte e 2 strati di salumi, abbinando carciofi al prosciutto cotto e patate al crudo o al salmone, fermando con stuzzicadenti.',
5
);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Falafel originali',
'1 bicchiere fave secche senza buccia; 1/2 bicchiere ceci secchi; 2 spicchi d’aglio; 1/2 cipolla bianca; prezzemolo fresco; 2 cucchiaini sale; coriandolo o spezia gialla; 1 cucchiaino pepe; 1 cucchiaino paprika; 1 cucchiaino cannella; 1/2 cucchiaino cumino; 1/4 cucchiaino bicarbonato; olio per frittura; salsa tarator (tahin, limone, aglio)',
'Metti in ammollo fave e ceci per 12 ore, poi scolali e falli asciugare. Frulla legumi, aglio, cipolla e prezzemolo fino a ottenere un impasto omogeneo. Aggiungi sale e spezie, rimixa e lascia riposare un’ora. Scalda abbondante olio, forma i falafel della stessa dimensione e friggili finché diventano dorati. Scola su carta e servi con salsa tarator.',
8
);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Falafel originali',
'1 bicchiere fave secche senza buccia; 1/2 bicchiere ceci secchi; 2 spicchi d’aglio; 1/2 cipolla bianca; prezzemolo fresco; 2 cucchiaini sale; coriandolo o spezia gialla; 1 cucchiaino pepe; 1 cucchiaino paprika; 1 cucchiaino cannella; 1/2 cucchiaino cumino; 1/4 cucchiaino bicarbonato; olio per frittura; salsa tarator (tahin, limone, aglio)',
'Metti in ammollo fave e ceci per 12 ore, poi scolali e falli asciugare. Frulla legumi, aglio, cipolla e prezzemolo fino a ottenere un impasto omogeneo. Aggiungi sale e spezie, rimixa e lascia riposare un’ora. Scalda abbondante olio, forma i falafel della stessa dimensione e friggili finché diventano dorati. Scola su carta e servi con salsa tarator.',
8
);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Riso sushi e poke',
'2 bicchieri riso originario; 2 bicchieri acqua; 40 g aceto di riso o mele; 20 g zucchero; 10 g sale',
'Sciacqua il riso finché l’acqua diventa trasparente. Mettilo in pentola con pari quantità d’acqua, copri e cuoci a fuoco medio finché il vapore esce dal coperchio. Abbassa al minimo e cuoci 20 minuti, poi riposa 5 minuti senza aprire. Mescola aceto, zucchero e sale, versa sul riso in una ciotola e raffredda sventolando.',
9);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}


$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Spätzle alla zucca',
'300 g farina; 3 uova; 200 ml latte; 150 g zucca cotta; 1 cucchiaino sale; noce moscata; 1 cipolla bianca; 80 g speck; grana; erba cipollina; noci; semi di papavero',
'Cuoci la zucca al vapore e frullala con latte, uova, sale e noce moscata. Aggiungi la farina e mescola fino a ottenere un composto omogeneo. Cuoci gli spätzle in acqua bollente salata usando l’apposito attrezzo e scolali quando salgono a galla. Soffriggi cipolla tritata con un po’ d’olio e acqua, aggiungi lo speck a julienne. Unisci gli spätzle al condimento e completa con grana, erba cipollina, noci e semi di papavero.',
10);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Goulash',
'1 kg guance di manzo; 500 g cipolle dorate; 1/2 bicchiere vino rosso; 2 cucchiai paprika dolce; 1 cucchiaio semi di cumino; 30 g burro; 2 cucchiaini dado vegetale; 200 g polpa di pomodoro',
'Taglia le cipolle a fette grosse e rosolale nel burro. Aggiungi i semi di cumino e poi la carne, mescolando per farla rosolare bene. Unisci la paprika e sfuma con il vino rosso. Aggiungi pomodoro, dado e acqua calda fino a coprire la carne. Cuoci a fuoco dolce per almeno un’ora e mezza.',
1);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Pesto zucchine e mandorle',
'270 g penne rigate; 2 zucchine; 40 g mandorle senza pelle; 30 g parmigiano; 10 foglie basilico; 4 foglie menta; una puntina di aglio; olio extra vergine; sale',
'Metti sul fuoco la pentola per la pasta e un pentolino con acqua per sbollentare. Lava le zucchine, elimina alcune strisce di buccia, tagliale e sbollentale 3 minuti. Nel mixer trita mandorle, parmigiano, basilico, menta e una puntina di aglio. Aggiungi sale, olio e le zucchine a pezzi, poi frulla fino a ottenere un pesto cremoso. Condisci le penne scolate al dente.',
2);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Stemperata siciliana',
'1 costa sedano; 1 carota; 1 spicchio aglio; 1 piccola cipolla; 100 g olive; 1/2 bicchiere aceto bianco; 1 cucchiaio zucchero; 40 g olio evo; menta; sale; pepe; 2 fette tonno fresco (500 g)',
'Mescola aceto e zucchero per preparare l’agrodolce. Pulisci e affetta le verdure. Rosola la cipolla con olio e acqua, poi aggiungi sedano, carota, aglio, olive, sale, pepe e menta. Sfuma con l’agrodolce e spegni. Cuoci il tonno su entrambi i lati, mettilo in un piatto e coprilo con la stemperata. Lascia riposare in frigo e servi a temperatura ambiente.',
3);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Alette di pollo',
'800 g alette di pollo; sale; pepe; 1 spicchio aglio tritato; 2 cucchiai salsa di soia; 2 cucchiai concentrato di pomodoro; 1 cucchiaino miele; 1 cucchiaino zucchero di canna; peperoncino; 1 cucchiaino amido di mais sciolto in mezzo bicchiere d’acqua; 2 cucchiai olio evo; erba cipollina; semi di sesamo',
'Condisci le alette con sale e pepe e disponile in teglia su carta forno. Cuoci 30 minuti a 180°C. Prepara la salsa mescolando olio, aglio, concentrato, miele, zucchero, salsa di soia e amido sciolto in acqua, poi falla addensare. Passa le alette cotte in padella con la salsa e servi con sesamo ed erba cipollina.',
4);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Pollo con zucca grigliata, funghi e gorgonzola',
'600 g petti di pollo; farina; 150 g funghi champignon; 1 busta zucca grigliata Orogel; 50 g gorgonzola piccante; 2 spicchi aglio; sale; pepe; olio evo',
'Infarina i petti di pollo e rosolali in padella con olio e uno spicchio d’aglio in camicia. Aggiungi 100 ml di acqua calda e sale e cuoci 10 minuti. In un’altra padella rosola mezzo spicchio d’aglio con olio, aggiungi funghi e cuoci qualche minuto, poi unisci la zucca, sale e pepe e cuoci 7 minuti. Aggiungi funghi e zucca al pollo e cuoci altri 5 minuti. Quando resta poco liquido, unisci il gorgonzola a cubetti, copri 2 minuti e servi con prezzemolo.',
5);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Bracioline alla messinese',
'500 g fettine di carne sottili; 150 g pangrattato; 50 g caciocavallo grattugiato; 50 g pistacchio non tostato tritato; 150 g tuma o caciocavallo fresco o provola; 1 spicchio aglio; sale; pepe; prezzemolo; olio extra vergine',
'Prepara il pangrattato condito mescolando pangrattato, caciocavallo grattugiato, sale, pepe, aglio e prezzemolo tritati e un filo d’olio. Ungi ogni fettina di carne in un piatto con olio e passala nella panatura su entrambi i lati. Metti al centro un pezzo di tuma, aggiungi un po’ di pangrattato condito e arrotola chiudendo i lembi laterali. Compatta l’involtino e infilalo nello spiedo. Ripeti per tutte le fettine. Passa gli spiedini nell’olio e cospargili di pistacchio tritato. Cuoci in forno a 180°C ventilato per 10-12 minuti.',
6);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Melanzane ripiene',
'2 melanzane; 400 g pelati; 1 spicchio d’aglio; olive denocciolate; 150 g mozzarella di bufala; origano; basilico; olio extravergine; sale; pepe',
'Taglia le melanzane a metà, incidile, sala, aggiungi olio e cuoci a 180°C ventilato per 30 minuti. Prepara il pomodoro cuocendo i pelati con olio, aglio, sale e pepe. Distribuisci il pomodoro sulle melanzane, aggiungi mozzarella e olive e inforna 10 minuti. Servi con origano e basilico.',
3);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Ramen',
'1 litro acqua; 2 uova; 2 cucchiai fiocchi di bonito (o 1/2 cucchiaio dashi granulare); 1/2 cucchiaino miso; 4-5 funghi shiitake secchi; 1 carota; 1 coscia di pollo o pancetta; 1 spicchio aglio; olio di arachidi; salsa di soia; cipollotto; alga nori; sesamo nero; 2 porzioni pasta per ramen',
'Prepara le uova marinate cuocendole 3 minuti dal bollore, raffreddale, sbucciale e lasciale in salsa di soia. Ammolla i funghi, strizzali e tagliali. Taglia la carota a listarelle. Marina il pollo con soia, aglio e olio, poi cuocilo in padella; nella stessa padella cuoci carote e funghi e aggiungi soia. Prepara il brodo bollendo acqua e bonito 3 minuti, spegni e aggiungi miso, poi filtra. Cuoci gli spaghetti per ramen e sciacquali. Componi la ciotola con soia sul fondo, noodles, pollo, funghi, carote, l’uovo marinato e il brodo caldo. Decora con cipollotto, sesamo e alga nori.',
3);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Gyoza al tonno e verdure',
'210 g farina 0; 130 g acqua bollente; 1/2 cucchiaino sale; 120 g tonno sgocciolato; 100 g cavolo cappuccio; 1 carota piccola; 2 cipollotti; 5 cm zenzero; 1 spicchio aglio; 1 cucchiaio olio di sesamo tostato; sale; olio di arachidi; salsa di soia; aceto di riso o ponzu',
'Prepara la pasta unendo farina, acqua bollente e sale, impasta e fai riposare 30 minuti. Prepara il ripieno mescolando tonno, cavolo, carota, cipollotti, zenzero, aglio, sale e olio di sesamo. Taglia il cilindro di pasta in pezzi e stendi ogni pezzo in un dischetto. Riempilo con poco ripieno, chiudi a mezzaluna e sigilla con pieghe. Scalda olio in padella, soffriggi i gyoza un minuto, aggiungi mezzo bicchiere d’acqua, copri e cuoci 7 minuti. Servi con salsa di soia e aceto di riso.',
3);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}

$sql = "INSERT INTO recipes (titolo, ingredienti, descrizione, chef_id) VALUES
(
'Ravioli cinesi con gamberi e branzino (Xiao mai)',
'Per la pasta: 200 g farina 00; 100 g acqua calda; 5 g sale. Per il ripieno: 350 g code di gambero; 1 branzino; 3 foglie verza; 1 cipollotto; zenzero sott’aceto; 4 cucchiai salsa di soia; 2 cm zenzero fresco. Per la salsa: 6 cucchiai salsa di soia; 3 cucchiai aceto di riso; 1 cucchiaino olio di semi; 1 cm zenzero fresco.',
'Impasta farina, sale e acqua calda fino a ottenere un impasto liscio e fallo riposare 30 minuti. Trita i gamberi e mescolali con salsa di soia, verza, cipollotto e zenzero. Filetta il branzino, tritalo e condisci allo stesso modo. Stendi la pasta e ricava dischetti di 4 cm, farciscili con ripieno di gamberi o branzino e chiudi a pizzicotti lasciando la sommità aperta. Cuoci a vapore su foglie di verza per 5-6 minuti. Mescola gli ingredienti della salsa e servi i ravioli pucciandoli prima di mangiarli.',
3
);";

if ($conn->query($sql) === TRUE)
{
    echo "Ricetta inserita.<br>";
}
else
{
    echo "Errore: " . $conn->error . "<br>";
}


?>