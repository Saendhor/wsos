<!DOCTYPE html>
<html>
<head>
    <title>Namespaces</title>
</head>
<body>
    <h3>Namespace</h3>
    <?php   
    require "esempio49.php";
    require "esempio50.php";

    // uso esplicito dei namespace
    $htmlTable = new Html\Table();
    $furnitureTable = new Furniture\Table();

    $htmlTable->render();
    echo "<br>";
    $furnitureTable->material();
    ?>
</body>
</html>
