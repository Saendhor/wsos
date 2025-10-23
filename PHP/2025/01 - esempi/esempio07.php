<!DOCTYPE html>
<html>
<head>
    <title>Math</title>
</head>
<body>
    
<?php
    echo 'echo(pi()): ';
    echo(pi());
    echo "<br>";

    echo 'echo(min(0, 150, 30, 20, -8, -200)): ';
    echo(min(0, 150, 30, 20, -8, -200));
    echo "<br>";

    echo 'echo(max(0, 150, 30, 20, -8, -200)): ';
    echo(max(0, 150, 30, 20, -8, -200));
    echo "<br>";

    echo 'echo(abs(-6.7)): ';
    echo(abs(-6.7));
    echo "<br>";

    echo 'echo(sqrt(64)): ';
    echo(sqrt(64));
    echo "<br>";

    echo 'echo(round(0.60)): ';
    echo(round(0.60));
    echo "<br>";

    echo 'echo(round(0.49)): ';
    echo(round(0.49));
    echo "<br>";

    print microtime(true) * 1000000;
    echo "<br>";
    echo "<br>";

    // srand non serve ma se si vuole usare si puo impostare un seed con microtime
    srand((int) (microtime(true) * 1000000));


    echo 'echo(rand()): ';
    echo(rand());
    echo "<br>";

    echo 'echo(rand(10, 100)): ';
    echo(rand(10, 100));
?>

</body>
</html>
