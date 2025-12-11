<?php
session_start();

// accesso solo se autenticato
if (!isset($_SESSION['user']))
{
    header("Location: esempio57_8.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Area Riservata</title></head>
<body>

<h1>Area Riservata</h1>

Benvenuto <?php echo $_SESSION['user'];?><br><br>

<a href="esempio57_10.php">Logout</a>

</body>
</html>
