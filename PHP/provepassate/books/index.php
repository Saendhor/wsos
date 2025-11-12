<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = "SELECT * FROM books ORDER BY ranking";
    $result = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Lista dei Libri</title>
</head>
<body>
    <form method="post">
        <button type="submit">Mostra Lista Libri</button>
    </form>

    <?php if (!empty($result) && mysqli_num_rows($result) > 0): ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>ISBN</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Ranking</th>
                <th>Year</th>
                <th>Price</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><a href="update_form.php?isbn=<?= $row['isbn'] ?>"><?= $row['isbn'] ?></a></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['author'] ?></td>
                    <td><?= $row['publisher'] ?></td>
                    <td><?= $row['ranking'] ?></td>
                    <td><?= $row['year'] ?></td>
                    <td><?= $row['price'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>

    <?php mysqli_close($conn); ?>
</body>
</html>
