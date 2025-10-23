<!DOCTYPE html>
<html>
<head>
    <title>Scope</title>
</head>
<body>
    
<?php
    $x = 5;// global scope
    $y = 10;// global scope

    function myTest1()
    {
        // using x inside this function will generate an error
        echo "<p>Variable x inside function is: $x</p>";
    }
    myTest1();
    echo "<p>Variable x outside function is: $x</p>";

    function myTest2()
    {
        $x = 5; // local scope
        echo "<p>Variable x inside function is: $x</p>";
    }
    myTest2();
    
    // using x outside the function will generate an error
    echo "<p>Variable x outside function is: $x</p>";

    function myTest3()
    {
        global $x, $y;
        $y = $x + $y;
    }
    myTest3();
    echo $y . "<br>";

    function myTest4()
    {
        $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
    }
    myTest4();
    echo $y . "<br>";

    function myTest5()
    {
        static $x = 0;
        echo $x . "<br>";
        $x++;
    }
    myTest5();
    myTest5();
    myTest5();

?>

</body>
</html>
