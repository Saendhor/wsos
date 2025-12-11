<?php

define("DEBUG", true);

$conn = new mysqli("localhost", "username", "password", "MyDB");
  
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['delete']))
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            if(DEBUG)
                echo "Id: $id<br>";

            $sql = "SELECT * FROM MyGuests WHERE id = $id";
            if(DEBUG)
                echo "Query: $sql<br>";

            $result = $conn->query($sql);

            if($result && $result->num_rows == 1)
            {
                $row = $result->fetch_assoc();
                echo "Cancellare il record con id: " . $row['id'];
                echo " nome: " . $row['firstname'];
                echo " cognome: " . $row['lastname'];
                echo "?";


                echo "<form action='esempio34_2DeleteConfirm.php' method='POST'>\n";
                echo "  <input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<input type='submit' name='delete' value='deleteConfirm'>\n";
                echo "  </form>\n";        

            }


        }

    }
}
else
{
    header("Location: esempio34_2Index.php");
}



$conn->close();


?>