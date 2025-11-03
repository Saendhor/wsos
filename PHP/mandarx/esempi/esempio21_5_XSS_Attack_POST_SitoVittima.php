<!DOCTYPE html>
<html>
<head>
    <title>XSS Attack - Unsafe page</title>
</head>
<body bgcolor="#ff4d4d">
    <h3>XSS attack con POST (sito vittima)</h3><br>
    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $id = $_POST["id"] ?? "";
            if ($id !== "")
            {
                echo "<h2>l'id richiesto è $id</h2>"; // stampa NON sanitizzata: vulnerabile a XSS
            }
            else
            {
                echo "<p>Nessun id fornito.</p>";
            }
        }
        else
        {
            header("location: http://127.0.0.1/esempio21_4_XSS_Attack_POST_SitoVittima.php");
        }
    ?>
</body>
</html>
