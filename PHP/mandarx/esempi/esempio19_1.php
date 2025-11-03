<!DOCTYPE html>
<html>
<head>
    <title>Form POST e GET</title>
</head>
<body>

<h3>Form con metodo POST</h3>
<form action="esempio19_2.php" method="POST">
    <label for="fname_post">First name:</label><br>
    <input type="text" id="fname_post" name="fname" value="John"><br>
    <label for="lname_post">Last name:</label><br>
    <input type="text" id="lname_post" name="lname" value="Doe"><br><br>
    <input type="submit" value="Invia con POST">
</form>

<h3>Form con metodo GET</h3>
<form action="esempio19_3.php" method="GET">
    <label for="fname_get">First name:</label><br>
    <input type="text" id="fname_get" name="fname" value="John"><br>
    <label for="lname_get">Last name:</label><br>
    <input type="text" id="lname_get" name="lname" value="Doe"><br><br>
    <input type="submit" value="Invia con GET">
</form>

</body>
</html>
