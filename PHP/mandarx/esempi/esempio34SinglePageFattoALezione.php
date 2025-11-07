<?php
//CRUD

define("DEBUG", true);

$conn = new mysqli("localhost", "username", "password", "MyDB");


if($_SERVER['REQUEST_METHOD'] == "GET")
{
    if(DEBUG)
        echo "metodo get<br>";
    
    echo "\n<form action='" . $_SERVER["PHP_SELF"] ."' method='POST'>\n";
    echo "  <input type='submit' name='azione' value='create'>\n";
    echo "</form><br>\n";

    //presentare eventuali dati e permettere di modificarli
    $sql = "SELECT * FROM MyGuests;";

    if(DEBUG)
        echo "sql: $sql<br>";

    $results = $conn->query($sql);

    if($results && $results->num_rows > 0)
    {
        while ($row = $results->fetch_assoc())
        {
            echo "id: " . $row["id"];
            echo ", nome: " . $row["firstname"];
            echo ", cognome: " . $row["lastname"];
            echo "\n<form action='" . $_SERVER["PHP_SELF"] ."' method='POST'>\n";
            echo "  <input type='hidden' name='id' value='" . $row["id"] . "'>\n";
            echo "  <input type='submit' name='azione' value='update'>\n";
            echo "  <input type='submit' name='azione' value='delete'>\n";
            echo "</form><br>\n";
        }
    }
}
else
{
    if(DEBUG)
        echo "metodo post<br>";

    //quale azione è stata richiesta?
    $azione = $_POST['azione'];
    $id = $_POST['id'] ?? "";

    if(DEBUG)
        echo "azione: $azione<br>";
    
    if(DEBUG)
        if($id != "")
            echo "id: $id<br>";

    switch ($azione)
    {
        case "update":
        {
            $sql = "SELECT * FROM MyGuests WHERE id=$id;";

            if(DEBUG)
                echo "sql: $sql<br>";

            $results = $conn->query($sql);

            if($results && $results->num_rows > 0)
            {
                $row = $results->fetch_assoc();
                echo "\n<form action='" . $_SERVER["PHP_SELF"] ."' method='POST'>\n";
                echo "  <input type='hidden' name='id' value='" . $row["id"] . "'>\n";
                echo "  <input type='text' name='nome' value='" . $row["firstname"] . "'>\n";
                echo "  <input type='text' name='cognome' value='" . $row["lastname"] . "'>\n";
                echo "  <input type='mail' name='email' value='" . $row["email"] . "'>\n";
                echo "  <input type='submit' name='azione' value='confirmUpdate'>\n";
                echo "</form><br>\n";
            }
        }
        break;

        case "confirmUpdate":
        {
            $nome = $_POST['nome'] ?? "";
            $cognome = $_POST['cognome'] ?? "";
            $email = $_POST['email'] ?? "";

            $sql = "UPDATE MyGuests SET firstname='$nome', lastname='$cognome', email='$email' WHERE id=$id;";
            if(DEBUG)
                echo "sql: $sql<br>";

            $conn->query($sql);

            echo "record aggiornato.<br>";
        }
        break;

        case "delete":
        {
            $sql = "SELECT * FROM MyGuests WHERE id=$id;";

            if(DEBUG)
                echo "sql: $sql<br>";

            $results = $conn->query($sql);

            if($results && $results->num_rows > 0)
            {
                $row = $results->fetch_assoc();
                echo "Vuoi veramente cancellare il record id: " . $row['id'] . " (" . $row['firstname'] . " " . $row['lastname'] .")";
                
                echo "\n<form action='" . $_SERVER["PHP_SELF"] ."' method='POST'>\n";
                echo "  <input type='hidden' name='id' value='" . $row["id"] . "'>\n";
                echo "  <input type='submit' name='azione' value='confirmDelete'>\n";
                echo "</form><br>\n";

            }
        }
        break;

        case "confirmDelete":
        {
            $sql = "DELETE FROM MyGuests WHERE id=$id;";

            if(DEBUG)
                echo "sql: $sql<br>";

            $conn->query($sql);

            echo "Il record $id è stato cancellato";
        }
        break;

        case "create":
        {
            echo "\n<form action='" . $_SERVER["PHP_SELF"] ."' method='POST'>\n";
            echo "  <input type='text' name='nome' value=''>\n";
            echo "  <input type='text' name='cognome' value=''>\n";
            echo "  <input type='mail' name='email' value=''>\n";
            echo "  <input type='submit' name='azione' value='confirmCreate'>\n";
            echo "</form><br>\n";
        }
        break;

        case "confirmCreate":
        {
            $nome = $_POST['nome'] ?? "";
            $cognome = $_POST['cognome'] ?? "";
            $email = $_POST['email'] ?? "";

            $sql = "INSERT INTO  MyGuests (firstname, lastname, email) VALUES ('$nome', '$cognome', '$email');";
            if(DEBUG)
                echo "sql: $sql<br>";

            $conn->query($sql);

            echo "record creato.<br>";
        }
    }
    
    echo "\n<form action='" . $_SERVER["PHP_SELF"] ."' method='GET'>\n";
    echo "  <input type='submit' name='azione' value='indietro'>\n";
    echo "</form><br>\n";

    $conn->close();
    //U
        //D
        //C
    //calcel

}

?>