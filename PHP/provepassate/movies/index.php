<?php
    define("DEBUG", true);

    //Define the variables for the database
    $hostname = "localhost";
    $username = "user";
    $password = "password";
    $database = "myDatabase";
    $table = "movies";

    //Enstablish a connection with the database
    $conn = new mysqli($hostname, $username, $password, $database);
    //Check if $conn has errors
    if ($conn->connect_errno) {
        die("Error while enstablishing database connection " . $conn->connect_error . "<br>");
    } else {
        echo "Connection enstablished with user: $user<br>";
    }

    //By default, the index should show all the entries in the $database
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        echo "Welcome  " . $_SERVER['PHP_SELF'] . "!<br>";
        echo "";

        //READ
        echo "<form action = '" . $_SERVER['PHP_SELF'] . "' method = 'POST'>";
        echo "<input type = 'submit' name = 'action' value = 'read' >";

        //CREATE
        echo "<form action = '" . $_SERVER['PHP_SELF'] . "' method = 'POST'>";
        echo "<input type = 'submit' name = 'action' value = 'create' >";

        //UPDATE
        echo "<form action = '" . $_SERVER['PHP_SELF'] . "' method = 'POST'>";
        echo "<input type = 'submit' name = 'action' value = 'update' >";

        //DELETE
        echo "<form action = '" . $_SERVER['PHP_SELF'] . "' method = 'POST'>";
        echo "<input type = 'submit' name = 'action' value = 'delete' >";
        
        echo "</form>";
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (DEBUG) {
            echo "Request method: " . $_SERVER['REQUEST_METHOD'] . "<br>";
        }

        //Take the 'action' parameter from the POST
        $action = $_POST['action'] ?? "";
        if (DEBUG) {
            echo "Action in POST: $action<br>";
        }

        switch ($action) {
            case 'read':
                //We build the query
                $query = "SELECT * FROM $table;";
                if (DEBUG) {
                    echo "$query<br>";
                }
                //Insert the query in a variable
                $result = $conn->query($query);
                //if result is non-empty
                if ($result && $result->num_rows > 0)  {
                    while ($row = $result->fetch_assoc()) {
                        //Display the informations per row
                        //title, director, year, duration_minutes, genre
                        echo "id : " . $row['id'];
                        echo ", director: " . $row['director'];
                        echo ", year: " . $row['year'];
                        echo ", duration (min): " . $row['duration_minutes'];
                        echo ", genre: " . $row['genre'];
                        echo "<br>";
                    }
                }
                //Unset $query
                unset($query);
                break;
                
            case 'create':
                echo "<form action = '" . $_SERVER['PHP_SELF'] ."' method = 'POST'>";
                echo "<input type = 'text' name = 'title' value = 'new title'>";
                echo "<input type = 'text' name = 'director' value = 'new director'>";
                echo "<input type = 'text' name = 'year' value = 'new year'>";
                echo "<input type = 'text' name = 'duration' value = 'new duration'>";
                echo "<input type = 'text' name = 'genre' value = 'new genre'>";
                echo "<input type = 'submit' name = 'action' value = 'confirmCreate'>";
                echo "</form>";
                break;
            
            case 'confirmCreate':
                //Take the parameters from user form
                $new_title = $_POST["title"] ?? "";
                $new_director = $_POST['director'] ?? "";
                $new_year = $_POST['year'] ?? "";
                $new_duration = $_POST['duration'] ?? "";
                $new_genre = $_POST['genre'] ?? "";

                echo "Creating item: $new_title, $new_director, $new_year, $new_duration, $new_genre<br>";
                //Build the query
                $query = "INSERT INTO $table (title, director, year, duration_minutes, genre) VALUES ('$new_title', '$new_director', '$new_year', '$new_duration', '$new_genre');";

                if (DEBUG) {
                    echo "$query<br>";
                }
                //Execute query
                $conn->query($query);
                //Unset $query
                unset($query);
                break;
            
            case 'update':
                echo "Select the id of the item you want to update and change the parameters";
                echo "<form action = '" . $_SERVER['PHP_SELF'] ."' method = 'POST'>";
                echo "<input type = 'text' name = 'id' value = 'select id'>";
                echo "<input type = 'submit' name = 'action' value = 'confirmUpdate'>";
                echo "</form>";
                break;
            
            case 'confirmUpdate':
                $id = $_POST['id'] ?? "";
                $query = "SELECT * FROM $table WHERE id = '$id';";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                echo "id : " . $row['id'];
                echo ", title: " . $row['title'];
                echo ", director: " . $row['director'];
                echo ", year: " . $row['year'];
                echo ", duration (min): " . $row['duration_minutes'];
                echo ", genre: " . $row['genre'];
                echo "<br>";

                //Form to update
                echo "\n<form action = '".$_SERVER["PHP_SELF"]."' method = 'POST' >\n";
                echo "<input type = 'hidden' name = 'id' value = '". $row["id"] ."' >\n";
                echo "<input type = 'text' name = 'director' value = '". $row["director"] ."' >\n";
                echo "<input type = 'text' name = 'year' value = '". $row["year"] ."' >\n";
                echo "<input type = 'text' name = 'duration' value = '". $row["duration_minutes"] ."' >\n";
                echo "<input type = 'text' name = 'genre' value = '". $row["genre"] ."' >\n";
                echo "<input type = 'submit' name = 'action' value = 'executeUpdate' >\n";
                echo "</form><br>\n";

                unset($query);
                break;

            case 'executeUpdate':
                //Take the parameters from user form
                $id = $_POST['id'] ?? "";
                $up_title = $_POST["title"] ?? "";
                $up_director = $_POST['director'] ?? "";
                $up_year = $_POST['year'] ?? "";
                $up_duration = $_POST['duration'] ?? "";
                $up_genre = $_POST['genre'] ?? "";

                if (DEBUG) {
                    echo "$id<br>";
                    echo "$up_genre<br>";
                }
                echo "Updating item to: $up_title, $up_director, $up_year, $up_duration, $up_genre<br>";
                $query = "UPDATE $table SET title = '$up_title', director = '$up_director', year = '$up_year', duration_minutes = '$up_duration', genre = '$up_genre' WHERE id = '$id';";

                //Perform the query
                $conn->query($query);

                unset($query);
                break;

            case 'delete':
                echo "Select the id of the item you want to delete";
                echo "<form action = '" . $_SERVER['PHP_SELF'] ."' method = 'POST'>";
                echo "<input type = 'text' name = 'id' value = 'select id'>";
                echo "<input type = 'submit' name = 'action' value = 'confirmDelete'>";
                echo "</form>";
                break;
            
            case 'confirmDelete':
                $toDelete = $_POST['id'] ?? "";
                echo "Deleting item with id: $id<br>";
                $query = "DELETE FROM $table WHERE id = $toDelete";
                if (DEBUG) {
                    echo "Query: $query<br>";
                }
                $result = $conn->query($query);
                echo "Element should be deleted.<br>";
                unset($query);
                break;
        }

        //Form to go back
        echo "<br>";
        echo "<a href = /index.php >Torna dietro</a>";
        
    }

    //Close connection
    $conn->close();
?>