<?php

define("DEBUG", true);

$conn = new mysqli("localhost", "username", "password", "MyDB");
  
$sql = "SELECT * FROM MyGuests";
if(DEBUG)
    echo "Query: $sql<br>";

$result = $conn->query($sql);

if($result && $result->num_rows > 0)
{
    echo "<table>";
    while($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "  <td>" . $row['id'] . "</td>\n";
        echo "  <td>" . $row['firstname'] . "</td>\n";
        echo "  <td>" . $row['lastname'] . "</td>\n";
        echo "  <td>" . $row['email'] . "</td>\n";
        echo "  <td><form action='esempio34_2Update.php' method='POST'>\n";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='submit' name='update' value='update'>\n";
        echo "  </form>\n</td>\n";        

        echo "  <td><form action='esempio34_2Delete.php' method='POST'>\n";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='submit' name='delete' value='delete'>\n";
        echo "  </form>\n</td>\n";        
                
        echo "</tr>";
    }
    echo "</table>";

//     echo "\n<form action='" . $_SERVER["PHP_SELF"] ."' method='POST'>\n";
  //  echo "  <input type='submit' name='azione' value='create'>\n";
    //echo "</form><br>\n";
}
else
{
    echo "Nessun dato presente";
}



   



$conn->close();


?>

<form action='esempio34_2New.php' method='POST'>
    <input type='text' name='nome' placeholder='nome'>
    <input type='text' name='cognome' placeholder='cognome'>
    <input type='email' name='email' placeholder='email'>
    <input type='submit' name='new' value='new'>
</form>