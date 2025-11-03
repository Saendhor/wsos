<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
</head>
<body>

<?php
// Modifichiamo email da text a email e impostiamo required per tutti
echo '<h3>Validazione del form</h3>';
echo '<form method="post" action="esempio20_2.php">';
echo 'Nome: <input type="text" name="name" required><br><br>';
echo 'Cognome: <input type="text" name="surname" required><br><br>';
echo 'E-mail: <input type="email" name="email" required><br><br>';
echo 'Genere: ';
echo '<input type="radio" name="gender" value="m" required> M ';
echo '<input type="radio" name="gender" value="f" required> F ';
echo '<br><br>';
echo '<input type="submit" name="submit" value="submit">';
echo '</form>';
// Ho risolto il problema?
?>

</body>
</html>