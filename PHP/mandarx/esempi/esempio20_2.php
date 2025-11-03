<!DOCTYPE html>
<html>
<head>
    <title>Form validation</title>
</head>
<body>

<?php
$name = $surname = $email = $gender = "";
$error = "";

// $name = $_POST["name"];
// $surname = $_POST["surname"];
// $email = $_POST["email"];
// $gender = $_POST["gender"];
// echo "Nome: $name<br>";
// echo "Cognome: $surname<br>";
// echo "Email: $email<br>";
// echo "Genere: $gender<br>";

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    if (isset($_POST["submit"]))
    {
        if ($_POST["submit"] === "submit")
        {
            $name = $_POST["name"] ?? "";

            if ($name != "")
            {
                $surname = $_POST["surname"] ?? "";

                if ($surname != "")
                {
                    $email = $_POST["email"] ?? "";

                    if ($email != "")
                    {
                        $gender = $_POST["gender"] ?? "";

                        if ($gender != "")
                        {

                        }
                        else
                        {
                            $error = "Genere non inserito<br>";
                        }
                    }
                    else
                    {
                        $error = "Email non inserita<br>";
                    }
                }
                else
                {
                    $error = "Cognome non inserito<br>";
                }
            }
            else
            {
                $error = "Nome non inserito<br>";
            }
        }
        else
        {
            $error = "Submit diverso<br>";
        }
    }
    else
    {
        $error = "Submit non settato<br>";
    }
}
else
{
    $error = "Non usa il metodo post<br>";
} 
      
if ($error != "")
{
    echo "<h3>Errore: $error</h3>";
}
else
{
    echo "<h3>Dati:</h3>";
    echo "Nome: $name<br>";
    echo "Cognome: $surname<br>";
    echo "Email: $email<br>";
    echo "Genere: $gender<br>";
}
?>

</body>
</html>