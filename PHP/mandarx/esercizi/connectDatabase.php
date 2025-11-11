<?php
    /* SLIDE 107
        Modificare l’esempio esempio24_5.php in modo da includere un file php che apra la
        connessione al database
    */

    define("DEBUG", true);

    // Defining constants of my mariadb configuration
    $hostname = "localhost";
    $username = "user";
    $password = "password";
    $database = "myDatabase";

    //hostname, username, password, database (4, string)
    $conn = new mysqli($hostname, $username, $password, $database);
    try {
        //Se connect_errno è diverso da 0 allora connessione fallita altrimenti effettuata
        if ($conn->connect_errno) {
            //exit()
            die("Connection failed". $conn->connect_error);
        } else {
            echo "Connessione effettuata.<br>";
        }

    // if exception then exit
    } catch (Exception $e) {
        die("Error during connection" . $e->getMessage());
    }

    //Set the query to database
    $tableName = "myGuests";
    $tableParameters = "(firstname VARCHAR(64) NOT NULL, lastname VARCHAR(64) NOT NULL, email VARCHAR(64) NOT NULL)";
    //Make sure is a new table
    $conn->query("DROP TABLE IF EXISTS $tableName;");
    //Create the new table
    $conn->query("CREATE TABLE $tableName $tableParameters;");

    //Performing INSERT
    $sql_insert = "INSERT INTO $tableName (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com');";
    if ("DEBUG"){
        echo "Query: " . $sql_insert ."<br><br>";
    }

    if ($conn->query($sql_insert) === TRUE) {
        echo "Items successfully inserted!<br>";
    } else {
        echo "Error while inserting items " . $conn->error . "<br>";
    }

    //Setting the query to show the items in the table
    $sql_show = $conn->query("SELECT * FROM $tableName;");
    //We assure ourselves the query is not empty or with errors
    if ($sql_show && $sql_show->num_rows > 0) {
        while ($row = $sql_show->fetch_assoc()) {
            //Organize parameters to show
            echo "firstname: " . $row["firstname"];
            echo ", surname: ", $row["surname"];
            echo ", email: ", $row["email"] . "<br>";
        }
    }

    //Cleaning database
    $conn->query("DROP TABLE IF EXISTS $tableName;");
    //closing connection to database
    $conn->close();
?>