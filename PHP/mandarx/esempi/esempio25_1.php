<!DOCTYPE html>
<html>
<head>
    <title>Header</title>
</head>
<body>
    <h3>Seleziona il tipo di risposta:</h3>
    <form action="esempio25_2.php" method="GET">
        <input type="radio" name="tipo" value="html" checked> HTML<br>
        <input type="radio" name="tipo" value="pdf"> PDF<br>
        <input type="radio" name="tipo" value="404"> Errore 404<br>
        <input type="radio" name="tipo" value="500"> Errore 500<br><br>

        <input type="radio" name="tipo" value="302"> Redirect 302<br><br>

        <label for="url">URL di destinazione (solo per redirect):</label><br>
        <input type="text" name="url" id="url" placeholder="https://esempio.com"><br><br>

        <input type="submit" value="Invia">
    </form>
</body>
</html>

