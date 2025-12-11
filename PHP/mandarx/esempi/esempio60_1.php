<!DOCTYPE html>
<html>
<head>
    <title>Sign up (md5)</title>
</head>
<body>
    <h3>Registrazione (con md5):</h3>
    <?php
        require("../Private/credentials.php");
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);
            $email = trim($_POST['email']);

            $salt = strrev($email);
            $password = md5($salt . $_POST['password'] . $salt . $pepper);

            $sql = "INSERT INTO MyGuests (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $firstname, $lastname, $email, $password);
            $stmt->execute();
            $stmt->close();

            echo "<h3>Registrazione completata.</h3>";
        }
        else
        {
            ?>
            <h3>Registrazione utente</h3>

            <form action="esempio60_1.php" method="POST">
                <label>Nome:</label><br>
                <input type="text" name="firstname" required><br><br>

                <label>Cognome:</label><br>
                <input type="text" name="lastname" required><br><br>

                <label>Email:</label><br>
                <input type="email" name="email"><br><br>

                <label>Password:</label><br>
                <input type="password" name="password" required><br><br>

                <input type="submit" value="Registrati">
            </form>

            <?php
        }
    ?>
</body>
</html>