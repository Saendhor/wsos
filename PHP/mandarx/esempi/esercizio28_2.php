<!DOCTYPE html>
<html>
<head>
    <title>Pagination with LIMIT and OFFSET</title>
</head>
<body>
    <h3>Paginazione con LIMIT e OFFSET</h3>
    <?php
        define("RECORD_PER_PAGINA", 10);

        $recordPerPagina = RECORD_PER_PAGINA; // uso una variabile per inserirla nelle query
        
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";
        
        require("functions/connessione.php");

        $conn = connect($servername, $username, $password, $dbname);

        // imposta il numero di record per pagina
        

        // calcola la pagina corrente
        $paginaCorrente = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
        if ($paginaCorrente < 1)
            $paginaCorrente = 1;

        $res = $conn->query("SELECT COUNT(*) AS totale FROM MyGuests");
        $row = $res->fetch_assoc();
        $recordTotali = $row['totale'];
        $numeriodiPagine = ceil($recordTotali / $recordPerPagina);

        if ($paginaCorrente > $numeriodiPagine)
            $paginaCorrente = $numeriodiPagine;

        $offset = ($paginaCorrente - 1) * $recordPerPagina;

        $sql = "SELECT * FROM MyGuests ORDER BY id ASC LIMIT $recordPerPagina OFFSET $offset";
        $result = $conn->query($sql);

        echo "<table>";
        echo "<tr><th>ID</th><th>Firstname</th><th>Lastname</th><th>Email</th><th>Reg_date</th></tr>";

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['firstname']}</td>
                        <td>{$row['lastname']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['reg_date']}</td>
                      </tr>";
            }
        }
        echo "</table>";

        // // calcolo totale pagine
        // $res = $conn->query("SELECT COUNT(*) AS totale FROM MyGuests");
        // $row = $res->fetch_assoc();
        // $recordTotali = $row['totale'];
        // $numeriodiPagine = ceil($recordTotali / $recordPerPagina);

        echo "<br>";

        if ($paginaCorrente > 1)
        {
            echo "<a href='?pagina=1'>[<<]</a> ";
            echo "<a href='?pagina=" . ($paginaCorrente - 1) . "'>[<]</a> ";
        }

        echo " Pagina $paginaCorrente di $numeriodiPagine ";

        if ($paginaCorrente < $numeriodiPagine)
        {
            echo "<a href='?pagina=" . ($paginaCorrente + 1) . "'>[>]</a> ";
            echo "<a href='?pagina=$numeriodiPagine'>[>>]</a>";
        }

        $conn->close();
    ?>
</body>
</html>

