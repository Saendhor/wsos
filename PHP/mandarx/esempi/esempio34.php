<!DOCTYPE html>
<html>
<head>
    <title>CRUD with MySQL on sigle page</title>
</head>
<body>
    <h3>Operazioni CRUD con singola pagina</h3>
    <?php
        require("../Private/credentials.php");
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        if ($_SERVER["REQUEST_METHOD"] === "GET")
        {
            $sql = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0)
            {
                echo "<table>";
                echo "<tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Azioni</th>
                    </tr>";

                while ($row = $result->fetch_assoc())
                {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['id']) . "</td>
                            <td>" . htmlspecialchars($row['firstname']) . "</td>
                            <td>" . htmlspecialchars($row['lastname']) . "</td>
                            <td>
                                <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' style='display:inline;'>
                                    <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                                    <input type='submit' name='action' value='read'>
                                    <input type='submit' name='action' value='update'>
                                    <input type='submit' name='action' value='delete'>
                                </form>
                            </td>
                        </tr>";
                }

                echo "</table><br>";

                // form per nuovo record
                echo "<form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                        <input type='submit' name='action' value='new'>
                    </form>";
            }
            else
            {
                echo "Nessun record trovato.<br>";
            }
        }
        else
        {
            if (isset($_POST["action"]))
            {
                $action = $_POST["action"];
                $id = $_POST["id"] ?? "";
                $firstname = $_POST["firstname"] ?? "";
                $lastname = $_POST["lastname"] ?? "";
                $email = $_POST["email"] ?? "";

                switch ($action)
                {
                    case "new":
                        echo "<h3>Inserisci un nuovo record</h3>";
                        echo "<form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                                <label for='firstname'>Nome:</label><br>
                                <input type='text' name='firstname' id='firstname' required><br><br>

                                <label for='lastname'>Cognome:</label><br>
                                <input type='text' name='lastname' id='lastname' required><br><br>

                                <label for='email'>Email:</label><br>
                                <input type='email' name='email' id='email'><br><br>

                                <input type='submit' name='action' value='create'>
                            </form>";
                        break;

                    case "create":
                        if ($firstname !== "" && $lastname !== "" && $email !== "")
                        {
                            // usare la funzione di validazione
                            $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";
                            if ($conn->query($sql))
                                echo "Record inserito.<br><br>";
                            else
                                echo "Errore: " . $conn->error . "<br><br>";
                        }
                        else
                        {
                            echo "I campi sono obbligatori.<br><br>";
                            
                        }
                        break;

                    case "read":
                    if ($id !== "")
                    {
                        $sql = "SELECT * FROM MyGuests WHERE id=$id";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0)
                        {
                            $row = $result->fetch_assoc();

                            echo "<p>"
                                . "<b>ID:</b> " . htmlspecialchars($row['id']) . "<br>"
                                . "<b>Firstname:</b> " . htmlspecialchars($row['firstname']) . "<br>"
                                . "<b>Lastname:</b> " . htmlspecialchars($row['lastname']) . "<br>"
                                . "<b>Email:</b> " . htmlspecialchars($row['email']) . "<br>"
                                . "<b>Data di registrazione:</b> " . htmlspecialchars($row['reg_date'])
                                . "</p>";
                        }
                        else
                        {
                            echo "Nessun record trovato con ID=$id.<br><br>";
                        }
                    }
                    else
                    {
                        echo "Inserisci un ID per leggere un record.<br><br>";
                    }
                    break;

                    case "update":
                        if ($id !== "")
                        {
                            $sql = "SELECT * FROM MyGuests WHERE id=$id";
                            $result = $conn->query($sql);
                            if ($result && $result->num_rows > 0)
                            {
                                $row = $result->fetch_assoc();
                                echo "<h3>Aggiorna record ID {$row['id']}</h3>";
                                echo "<form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                                        <input type='hidden' name='id' value='{$row['id']}'>
                                        <label for='firstname'>Nome:</label><br>
                                        <input type='text' name='firstname' id='firstname' value='" . htmlspecialchars($row['firstname']) . "'><br><br>

                                        <label for='lastname'>Cognome:</label><br>
                                        <input type='text' name='lastname' id='lastname' value='" . htmlspecialchars($row['lastname']) . "'><br><br>

                                        <label for='email'>Email:</label><br>
                                        <input type='email' name='email' id='email' value='" . htmlspecialchars($row['email']) . "'><br><br>

                                        <input type='submit' name='action' value='confirm_update'>
                                    </form>";
                            }
                            else
                            {
                                echo "Nessun record trovato con ID=$id.<br><br>";
                            }
                        }
                        else
                        {
                            echo "ID mancante per l'aggiornamento.<br><br>";
                        }
                        break;

                    case "confirm_update":
                        if ($id !== "")
                        {
                            // usare la funzione di validazione
                            $sql = "UPDATE MyGuests SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id=$id";
                            if ($conn->query($sql))
                                echo "Record con ID $id aggiornato.<br><br>";
                            else
                                echo "Errore nell'aggiornamento: " . $conn->error . "<br><br>";
                        }
                        else
                        {
                            echo "ID non valido per aggiornamento.<br><br>";
                        }
                        break;

                    case "delete":
                    if ($id !== "")
                    {
                        // recupera il record per confermare cosa si sta cancellando
                        $sql = "SELECT * FROM MyGuests WHERE id=$id";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0)
                        {
                            $row = $result->fetch_assoc();

                            echo "<h3>Conferma cancellazione</h3>";
                            echo "<p>"
                                . "<b>ID:</b> " . htmlspecialchars($row['id']) . "<br>"
                                . "<b>Firstname:</b> " . htmlspecialchars($row['firstname']) . "<br>"
                                . "<b>Lastname:</b> " . htmlspecialchars($row['lastname']) . "<br>"
                                . "<b>Email:</b> " . htmlspecialchars($row['email']) . "<br>"
                                . "<b>Registrato il:</b> " . htmlspecialchars($row['reg_date'])
                                . "</p>";

                            echo "<form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                                    <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                                    <input type='submit' name='action' value='confirm_delete'>
                                </form>";
                        }
                        else
                        {
                            echo "Nessun record trovato con ID=$id.<br><br>";
                        }
                    }
                    else
                    {
                        echo "ID mancante per cancellazione.<br><br>";
                    }
                    break;

                case "confirm_delete":
                    if ($id !== "")
                    {
                        $sql = "DELETE FROM MyGuests WHERE id=$id";
                        if ($conn->query($sql))
                            echo "Record con ID $id cancellato.<br><br>";
                        else
                            echo "Errore nella cancellazione: " . $conn->error . "<br><br>";
                    }
                    else
                    {
                        echo "ID non valido per la conferma di cancellazione.<br><br>";
                    }
                    break;
                }

                echo "<br><form method='GET' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                        <input type='submit' value='Torna alla tabella'></form>";
            }
        }

        $conn->close();
    ?>

</body>
</html>
