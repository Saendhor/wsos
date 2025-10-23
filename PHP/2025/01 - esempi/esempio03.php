<!DOCTYPE html>
<html>
<head>
    <title>echo and print</title>
</head>
<body>

<?php
    echo "Hello from echo<br>";
    //same as:
    echo("Hello from echo<br>");

    echo "This ", "string ", "was ", "made ", "with multiple parameters<br>.";

    $txt1 = "Learn PHP";
    $txt2 = "W3Schools.com";

    echo "<h2>$txt1</h2>";
    echo "<p>Study PHP at $txt2</p>";

    print "Hello from print<br>";
    //same as:
    print("Hello from print<br>");

    print "print accepts only one argument";
?>

</body>
</html>
