<?php

define("DEBUG", true);

$conn = new mysqli("localhost", "username", "password", "MyDB");
  
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['update']))
    {
        $id = $_POST['id'] ?? -1;
        $nome = $_POST['nome'] ?? "";
        $cognome = $_POST['cognome'] ?? "";
        $email = $_POST['email'] ?? "";

        if(DEBUG)
        {
            echo "Id: $id<br>";
            echo "Nome: $nome<br>";
            echo "Cognome: $cognome<br>";
            echo "Email: $email<br>";
        }
          
        $sql = "UPDATE MyGuests SET firstname='$nome', lastname='$cognome', email='$email' WHERE id = $id";

        if($conn->query($sql))
        {
            echo "Record aggiornato. Clicca <a href='esempio34_2Index.php'>qui</a> per tornare indietro.";
        }
    }
}
else
{
    header("Location: esempio34_2Index.php");
}



$conn->close();


?>