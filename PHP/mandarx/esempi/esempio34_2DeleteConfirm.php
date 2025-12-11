<?php

define("DEBUG", true);

$conn = new mysqli("localhost", "username", "password", "MyDB");
  
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['delete']))
    {
        $id = $_POST['id'] ?? -1;

        if(DEBUG)
            echo "Id: $id<br>";
          
        $sql = "DELETE FROM MyGuests WHERE id = $id";

        if($conn->query($sql))
        {
            echo "Record eliminato. Clicca <a href='esempio34_2Index.php'>qui</a> per tornare indietro.";
        }
    }
}
else
{
    header("Location: esempio34_2Index.php");
}



$conn->close();


?>