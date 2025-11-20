<?php

    define("DEBUG", true);

    $hostname = "localhost";
    $username = "user";
    $password = "password";
    $database = "myDatabase";
    $table = "santabox";

    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->errno) {
        die("Error while enstablishing connection " . $conn->errno);
    } else {
        echo "Connection succesfully enstablished!<br>";
    }

    //Defining homepage
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (DEBUG) {
            echo "Method: GET<br>";
        }
        echo "<form action = '". $_SERVER['PHP_SELF'] ."' method = 'POST'>";
        echo "<input type = 'submit' name = 'action' value = 'read'>";
        echo "<input type = 'submit' name = 'action' value = 'create'>";
        echo "</form>";
    }

    //Defining the pages with POST request
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $action = $_POST['action'] ?? "";
        if (DEBUG) {
            echo "Method: POST<br>";
            echo "Action: $action<br>";
        }

        switch($action) {
            case 'read':
                $query = "SELECT * FROM $table;";
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "id: " . $row['id'];
                        echo " , name: " . $row['name'];
                        echo " , gift: " . $row['gift'];
                        echo " , quantity: " . $row['quantity'];
                        echo " , delivered: " . $row['delivered'];

                        echo "<form action = '". $_SERVER['PHP_SELF'] ."' method = 'POST'>";
                        echo "<input type = 'hidden' name = 'id' value = '". $row['id'] ."'>";
                        echo "<input type = 'submit' name = 'action' value = 'update'>";
                        echo "<input type = 'submit' name = 'action' value = 'delete'>";
                        echo "</form>";
                    }
                }
                unset($query);
                break;
            
            case 'create':
                echo "<form action = '". $_SERVER['PHP_SELF'] ."' method = 'POST'>";
                echo "<input type = 'text' name = 'name' value = 'name'>";
                echo "<input type = 'text' name = 'gift' value = 'gift'>";
                echo "<input type = 'text' name = 'quantity' value = 'quantity'>";
                echo "<input type = 'text' name = 'delivered' value = 'delivered'>";
                echo "<input type = 'submit' name = 'action' value = 'confirmCreate'>";
                echo "</form>";
                break;
            
            case 'confirmCreate':
                //Define the parameters for the query
                $name = $_POST['name'];
                $gift = $_POST['gift'];
                $quantity = $_POST['quantity'];
                $delivered = $_POST['delivered'];
                echo "$name<br>";

                $query = "INSERT INTO $table(name, gift, quantity, delivered) VALUES ('$name', '$gift', $quantity, $delivered);";
                $conn->query($query);
                //Button to fast read
                echo "Item should be now inserted<br>";
                echo "<form action = '". $_SERVER['PHP_SELF'] ."' method = 'POST'>";
                echo "<input type = 'submit' name = 'action' value = 'read'>";
                echo "</form>";

                unset($query);
                break;

            case 'update':
                $id = $_POST['id'] ?? "";
                $query = "UPDATE $table SET 'delivered' = 1 WHERE id = $id;";
                $conn->query($query);
                echo "Delivery status updated<br>";

                break;
            
            case 'delete':
                $id = $_POST['id'] ?? "";
                echo "Deleting item with id: $id<br>";

                $query = "DELETE FROM $table WHERE id = '$id';";
                $conn->query($query);
                echo "Selected item should now be deleted<br>";
                unset($query);
                break;
            
            default:
                echo "action unrecognized";
                break;
        }
        echo "<br>";
        echo "<a href = /index.php>Homepage</a>";
        
    }
    $conn->close();
    //update rotto
?>