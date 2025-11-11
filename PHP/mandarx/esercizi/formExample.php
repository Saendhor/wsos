<?php
    // FORM EXAMPLE FOLLOWING SLIDE 88
    define("DEBUG",true);

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        //Message that appears
        echo "<b> Benvenuti bimbini sull'utilizzo dei form! Evvai! :D</b><br>";
        //if the name of the input is equal to shown then shows the other string
        if ($_GET['shown']) {
            echo "<br><br>Adesso prendiamo il pallone e facciamo una bella partita a calcio!!!<br>";
        }
        if ($_GET['sunny']) {
            echo "<br>Incredibile quanto sole possa esserci oggi!<br>";
        }
        echo "<br><br>";

    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Message that appears
        echo "<b><i>Welcome to the dark side of the POST...</i></b>";
        //if the name of the input is equal to hidden then reveals the other string
        if ($_POST['hidden']) {
            echo "<br><br><i>...ciao, mi hai scoperto...<i><br>";
            echo "<i>...sono l'insospettabile...<i><br>";
            echo "<i>...Agente Patogeno, id 8080!...<i>";
        }
        echo "<br><br>";
    } else {
        //Print the void
        echo "<br><br>";
        echo "<b><i>Endless void lies ahead</i></b>";
        echo "<br><br>";
    }

    //Button to send the GET request and revert the contents
    echo "<form action = '". $_SERVER['PHP_SELF'] . "' method = 'GET' >";
        echo "<input type = 'submit' name = 'shown' value = 'Send GET'>";
        echo "<input type = 'submit' name = 'sunny' value = 'Send GET'>";
    echo "</form>";

    //Button to send the POST request and change the contents
    echo "<form action = '". $_SERVER['PHP_SELF'] . "' method = 'POST' >";
        echo "<input type = 'submit' name = 'hidden' value = 'Send POST'>";
    echo "</form>";
?>