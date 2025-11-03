<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
</head>
<body>

<?php
echo '<h3>Validazione del form</h3>';
echo '<form method="post" action="esempio20_2.php">';
echo 'Nome: <input type="text" name="name"><br><br>';
echo 'Cognome: <input type="text" name="surname"><br><br>';
echo 'E-mail: <input type="text" name="email"><br><br>';
echo 'Genere: ';
echo '<input type="radio" name="gender" value="m"> M ';
echo '<input type="radio" name="gender" value="f"> F ';
echo '<br><br>';
echo '<input type="submit" name="submit" value="submit">';
echo '</form>';
?>


</body>
</html>