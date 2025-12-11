<!DOCTYPE html>
<html>
<head>
    <title>Sign in (password_hash)</title>
</head>
<body>
    <h3>Login (con password_hash):</h3>

    <?php
        require("../Private/credentials.php");
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            // recupero utente
            $sql = "SELECT id, firstname, lastname, password FROM MyGuests WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1)
            {
                $row = $result->fetch_assoc();

                // verifica la password
                if (password_verify($password, $row['password']))
                {
                    echo "<h3>Benvenuto {$row['firstname']} {$row['lastname']}.</h3>";
                }
                else
                {
                    echo "<h3>Password o email errata.</h3>";
                }
            }
            else
            {
                echo "<h3>Password o email errata.</h3>";
            }

            $stmt->close();
        }
        else
        {
            ?>

            <form action="esempio59_2.php" method="POST">
                <label>Email:</label><br>
                <input type="email" name="email" required><br><br>

                <label>Password:</label><br>
                <input type="password" name="password" required><br><br>

                <input type="submit" value="Accedi">
            </form>

        <?php
        }
    ?>
</body>
</html>
