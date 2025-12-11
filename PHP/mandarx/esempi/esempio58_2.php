<!DOCTYPE html>
<html>
<head>
    <title>Sign in (md5)</title>
</head>
<body>
    <h3>Login (con md5):</h3>

    <?php
        require("../Private/credentials.php");
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $email = trim($_POST['email']);
            $password = md5($_POST['password']);

            $sql = "SELECT id, firstname, lastname FROM MyGuests WHERE email = ? AND password = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1)
            {
                $row = $result->fetch_assoc();
                echo "<h3>Benvenuto {$row['firstname']} {$row['lastname']}.</h3>";
            }
            else
            {
                echo "<h3>Email o password errati.</h3>";
            }

            $stmt->close();
        }
        else
        {
            ?>

            <form action="esempio58_2.php" method="POST">
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
