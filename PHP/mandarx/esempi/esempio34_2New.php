<?php

define("DEBUG", true);

$conn = new mysqli("localhost", "username", "password", "MyDB");
  
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['new']))
    {
        $nome = $_POST['nome'] ?? "";
        $cognome = $_POST['cognome'] ?? "";
        $email = $_POST['email'] ?? "";

        if(DEBUG)
        {
            echo "Nome: $nome<br>";
            echo "Cognome: $cognome<br>";
            echo "Email: $email<br>";
        }
          
        $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('$nome', '$cognome', '$email')";

        if($conn->query($sql))
        {
            echo "Record inserito. Clicca <a href='esempio34_2Index.php'>qui</a> per tornare indietro.";
        }
    }
}
else
{
    header("Location: esempio34_2Index.php");
}



$conn->close();


?>