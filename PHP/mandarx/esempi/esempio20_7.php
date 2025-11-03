<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
</head>
<body>

<?php
// form con requisiti
echo '<h3>Validazione del form (con requisiti)</h3>';
echo '<form method="post" action="esempio20_8.php">';
echo 'Nome: <input type="text" name="name" required><br><br>';
echo 'Cognome: <input type="text" name="surname" required><br><br>';
echo 'E-mail: <input type="email" name="email" required><br><br>';
echo 'Genere: ';
echo '<input type="radio" name="gender" value="m" required> M ';
echo '<input type="radio" name="gender" value="f" required> F ';
echo '<br><br>';
echo 'Altezza (cm): <input type="number" name="height" min="50" max="250" required><br><br>';
echo 'Data di nascita (yyyy-mm-dd): <input type="text" name="birthdate" required><br><br>';
echo '<input type="submit" name="submit" value="submit">';
echo '</form>';

echo '<br><br>';

// form senza requisiti
echo '<h3>Validazione del form (senza requisiti)</h3>';
echo '<form method="post" action="esempio20_8.php">';
echo 'Nome: <input type="text" name="name"><br><br>';
echo 'Cognome: <input type="text" name="surname"><br><br>';
echo 'E-mail: <input type="text" name="email"><br><br>';
echo 'Genere: ';
echo '<input type="radio" name="gender" value="m"> M ';
echo '<input type="radio" name="gender" value="f" > F ';
echo '<br><br>';
echo 'Altezza (cm): <input type="text" name="height" min="50" max="250"><br><br>';
echo 'Data di nascita (yyyy-mm-dd): <input type="text" name="birthdate"><br><br>';
echo '<input type="submit" name="submit" value="submit">';
echo '</form>';
?>

</body>
</html>