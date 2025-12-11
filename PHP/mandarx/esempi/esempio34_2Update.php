<?php

define("DEBUG", true);

$conn = new mysqli("localhost", "username", "password", "MyDB");
  
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['update']))
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
                echo "<table>";
                echo "<tr>";
                echo "  <td>" . $row['id'] . "</td>\n";
                echo "  <td>" . $row['firstname'] . "</td>\n";
                echo "  <td>" . $row['lastname'] . "</td>\n";
                echo "  <td>" . $row['email'] . "</td>\n";
                echo "</tr>\n";
                echo "</table>\n";
                echo "<form action='esempio34_2UpdateConfirm.php' method='POST'>\n";
                echo "  <input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "  <input type='text' name='nome' value='" . $row['firstname'] . "'>";
                echo "  <input type='text' name='cognome' value='" . $row['lastname'] . "'>";
                echo "  <input type='email' name='email' value='" . $row['email'] . "'>";
                echo "<input type='submit' name='update' value='updateConfirm'>\n";
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