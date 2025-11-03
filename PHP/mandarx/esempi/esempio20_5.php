<!DOCTYPE html>
<html>
<head>
    <title>Form validation</title>
</head>
<body>

<?php
$name = $surname = $email = $gender = "";
$error = "";

function read_input($data)
{
    return trim($_POST[$data] ?? "");
}

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    if (read_input("submit") === "submit")
    {
        if ($_POST["submit"] )
        {
            $name = read_input("name");

            if ($name != "")
            {
                $surname = read_input("surname");

                if ($surname != "")
                {
                    $email = read_input("email");

                    if ($email != "")
                    {
                        $gender = read_input("gender");

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





