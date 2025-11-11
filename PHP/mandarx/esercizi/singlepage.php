<?php
//CRUD

define("DEBUG", true);
$conn = new mysqli("localhost", "user", "password", "myDatabase");

//metodo get?
if($_SERVER['REQUEST_METHOD'] == "GET") {

    if (DEBUG) {
        echo "metodo GET <br>";
    }
    //presentare eventuali dati e permetterli di modificarli
    $sql = "SELECT * FROM MyGuests;";

    if (DEBUG) {
        echo "sql: $sql <br>";
    }
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //Organizzo i parametri
            echo "id: " . $row["id"];
            echo ", firstname: " . $row["firstname"];
            echo ", surname: ", $row["surname"] . "<br>";
            
            //Creo il form per selezionare il record che voglio modificare
            echo "\n<form action = '".$_SERVER["PHP_SERVER"]."' method = 'POST' >\n";
            echo "<input type = 'hidden' name = 'id' value = '". $row["id"] ."' >\n";
            echo "<input type = 'submit' name = 'action' value = 'update' >\n";
            echo "<input type = 'submit' name = 'action' value = 'delete' >\n";
            echo "</form><br>\n";
        }

        echo "\n<form action = '".$_SERVER["PHP_SERVER"]."' method = 'POST' >\n";
        echo "<input type = 'create' name = 'action' value = 'create' >\n";
        echo "</form><br>\n";
    }
    //R U D
    //C

} else { //metodo post
    //quale azione è stata richiesta?

    if (DEBUG) {
        echo "metodo POST <br>";
    }
    $action = $_POST['action']; //potremmo sanificare
    $id = $_POST['id'] ?? ""; //potremmo sanificare
    
    if (DEBUG) {
        echo "action: $action";
        echo "id: $id";
    }

    switch ($action) {
        //UPDATE
        case "update":
            $sql = "SELECT * FROM MyGuests WHERE id = $id";
            if (DEBUG) {
                echo "sql: $sql<br>";
            }

            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "\n<form action = '".$_SERVER["PHP_SERVER"]."' method = 'POST' >\n";
                echo "<input type = 'hidden' name = 'id' value = '". $row["id"] ."' >\n";
                echo "<input type = 'text' name = 'name' value = '". $row["name"] ."' >\n";
                echo "<input type = 'submit' name = 'action' value = '". $row["surname"] ."' >\n";
                echo "<input type = 'submit' name = 'action' value = 'confirmUpdate' >\n";
                echo "</form><br>\n";
            }
            break;
        
        case "confirmUpdate":
            $name = $_POST["name"] ?? "";
            $surname = $_POST["surname"] ?? "";
            $sql = "UPDATE MyGuests SET firstname = '$name', lastname = '$surname' WHERE id = $id";
            if (DEBUG) {
                echo "sql: $sql<br>";
            }
            $conn->query($sql);
            echo "Record aggiornato<br>";
            break;

        //DELETE
        case "delete":
            $sql = "SELECT * FROM MyGuests WHERE id = $id";
            if (DEBUG) {
                echo "sql: $sql<br>";
            }

            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "Are you sure you want to delete the record id: " . $row["id"] ." (". $row["firstname"] . " " . $row["lastname"] .")<br>";
            }
        
            break;

        //CREATE
        case "create":
            break;
    }
    //cancel

}
?>