<!DOCTYPE html>
<html>
<head>
    <title>Form validation</title>
</head>
<body>

<?php
require("functions/validate.php");

$name = $surname = $email = $gender = $height = $birthdate = "";
$error = $errorDescription = "";

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    if (read_input("submit") === "submit")
    {
        if (read_input("submit") != "" )
        {
            $name = read_input("name");
            if(!validate_input($name, ValidationType::MIN_LENGTH, 2, $error))
            {
                $errorDescription .= $error . "<br>";
                //$errorDescriprion .= "Il nome deve contenere almeno due caratteri<br>";
            }

            $surname = read_input("surname");
            if(!validate_input($surname, ValidationType::MIN_LENGTH, 2, $error))
            {
                $errorDescription .= $error . "<br>";
                //$errorDescriprion .= "Il cognome deve contenere almeno due caratteri<br>";
            }

            $email = read_input("email");
            if(!validate_input($email, ValidationType::EMAIL, NULL, $error))
            {
                $errorDescription .= $error . "<br>";
                //$errorDescriprion .= "Email no valida<br>";
            }

            $gender = read_input("gender");
            if(!validate_input($gender, ValidationType::CUSTOM_SET, "mf", $error))
            {
                $errorDescription .= $error . "<br>";
                //$errorDescriprion .= "Genere non inserito<br>";
            }

            $height = read_input("height");
            if(!validate_input($height, ValidationType::INTEGER, NULL, $error))
            {
                $errorDescription .= $error . "<br>";
                //$errorDescriprion .= "L'altezza deve essere un numero intero<br>";
            }
            if(!validate_input($height, ValidationType::RANGE, [50, 250], $error))
            {
                $errorDescription .= $error . "<br>";
                //$errorDescriprion .= "L'altezza deve essere compresa tra 50 e 250 cm<br>";
            }

            $birthdate = read_input("birthdate");
            if (!validate_input($birthdate, ValidationType::DATE, NULL, $error))
            {
                $errorDescription .= $error . "<br>";
                //$errorDescriprion .= "La data deve essere in formato YYYY-MM-DD<br>";
            }
        }
        else
        {
            $errorDescription = "Submit diverso<br>";
        }
    }
    else
    {
        $errorDescription = "Submit non settato<br>";
    }
}
else
{
    $errorDescription = "Non usa il metodo post<br>";
    //in alternative si puo fare un redirect alla pagina corretta con header("location: esempio20_7.php");
} 
      
if ($errorDescription != "")
{
    echo "<h3>Errore:</h3><br>$errorDescription";
}
else
{
    echo "<h3>Dati:</h3>";
    echo "Nome: $name<br>";
    echo "Cognome: $surname<br>";
    echo "Email: $email<br>";
    echo "Genere: $gender<br>";
    echo "Altezza: $height<br>";
    echo "Data di nascita: $birthdate<br>";    
}
?>

</body>
</html>





