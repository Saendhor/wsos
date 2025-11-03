<!DOCTYPE html>
<html>
<head>
    <title>validate_input tests</title>
</head>
<body>

<?php
require("functions/validate.php");

function runTest(string $expected, string $label, string $value, ValidationType $type, mixed $req)
{
    $error = "";
    $ok = validate_input($value, $type, $req, $error);
    echo "&nbsp;&nbsp;&nbsp;&nbsp;" . ($expected == "y" ? "<span style='color: green;'>(atteso valido)</span> " : "<span style='color: red;'>(atteso non valido)</span> ") . "$label — '$value': " . ($ok ? "<img src='imgs/ok.jpg' width='10'>" : "$error <img src='imgs/ko.jpg' width='10'>") . "&nbsp;&nbsp;&nbsp;&nbsp;";
    if($expected == "y" && $ok || $expected == "n" && !$ok)
        echo "<img src='imgs/pass.jpg' width='30'><br>";
    else
        echo "<img src='imgs/fail.jpg' width='30'><br>";
}

// MIN_LENGTH
echo "MIN_LENGTH:<br>";
runTest("y", "","hello", ValidationType::MIN_LENGTH, 3);
runTest("n", "", "hi", ValidationType::MIN_LENGTH, 3);
print "<br>";

// MAX_LENGTH
echo "MAX_LENGTH:<br>";
runTest("y", "","hi", ValidationType::MAX_LENGTH, 3);
runTest("n", "", "hello", ValidationType::MAX_LENGTH, 3);
print "<br>";


// RANGE
echo "MAX_LENGTH:<br>";
runTest("y", "","25", ValidationType::RANGE, [10, 40]);
runTest("n", "", "50", ValidationType::RANGE, [10, 40]);
print "<br>";

// NUMERIC
echo "NUMERIC:<br>";
runTest("y", "","123", ValidationType::NUMERIC, null);
runTest("n", "", "abc", ValidationType::NUMERIC, null);
print "<br>";


// INTEGER
echo "INTEGER:<br>";
runTest("y", "","42", ValidationType::INTEGER, null);
runTest("n", "", "42.5", ValidationType::INTEGER, null);
print "<br>";

// FLOAT
echo "FLOAT:<br>";
runTest("y", "","3.14", ValidationType::FLOAT, null);
runTest("y", "","3", ValidationType::FLOAT, null);
runTest("n", "", "abc", ValidationType::FLOAT, null);
print "<br>";

// EMAIL
echo "EMAIL:<br>";
runTest("y", "base", "user@example.com", ValidationType::EMAIL, null);
runTest("y", "maiuscole", "USER@EXAMPLE.COM", ValidationType::EMAIL, null);
runTest("y", "sottodomini", "user@mail.server.example.com", ValidationType::EMAIL, null);
runTest("y", "trattino nel local", "user-1@example.com", ValidationType::EMAIL, null);
runTest("y", "trattino nel dominio", "user@ex-ample.com", ValidationType::EMAIL, null);
runTest("y", "trattino nel local e nel dominio", "user-1@ex-ample.com", ValidationType::EMAIL, null);
runTest("y", "top level domain lungo", "user@example.museum", ValidationType::EMAIL, null);
runTest("y", "underscore nel local", "user_1@example.com", ValidationType::EMAIL, null);

runTest("n", "doppia @", "user@@example.com", ValidationType::EMAIL, null);
runTest("n", "assenza @", "userexample.com", ValidationType::EMAIL, null);
runTest("n", "char non ammesso nel local", "user#@example.com", ValidationType::EMAIL, null);
runTest("n", "dominio vuoto prima del punto", "user@.com", ValidationType::EMAIL, null);
runTest("n", "top level domain troppo corto", "user@example.c", ValidationType::EMAIL, null);
runTest("n", "manca top level domain", "user@example", ValidationType::EMAIL, null);
runTest("n", "manca top level domain", "user@example.", ValidationType::EMAIL, null);
runTest("n", "termina con punto", "user@example.com.", ValidationType::EMAIL, null);
runTest("n", "underscore nel dominio", "user@exam_ple.com", ValidationType::EMAIL, null);
runTest("n", "termina con punto", "user@example.com.", ValidationType::EMAIL, null);
runTest("n", "spazi", "us er@example.com ", ValidationType::EMAIL, null);

print "<br>";

// URL (HTTP)
echo "URL:<br>";
runTest("y", "","https://example.com", ValidationType::URL, null);
runTest("y", "","http://esempio.it", ValidationType::URL, null);
runTest("y", "sottodominio", "https://sub.domain.example.com", ValidationType::URL, null);
runTest("y", "percorso", "https://example.com/path/page.html", ValidationType::URL, null);
runTest("y", "query string", "https://example.com/search?q=test", ValidationType::URL, null);
runTest("y", "porta", "https://example.com:8080", ValidationType::URL, null);
runTest("y", "porta + percorso", "https://example.com:8080/path", ValidationType::URL, null);
runTest("y", "porta + query", "https://example.com:8080/search?q=test", ValidationType::URL, null);
runTest("y", "percorso vuoto con slash finale", "https://example.com/", ValidationType::URL, null);
runTest("y", "percorso con caratteri speciali ammessi", "https://example.com/path-file_123", ValidationType::URL, null);

runTest("n", "slash singolo", "http:/bad", ValidationType::URL, null);
runTest("n", "slash singolo", "https:/bad", ValidationType::URL, null);
runTest("n", "slash mancanti", "http:bad", ValidationType::URL, null);
runTest("n", "slash mancanti", "https:bad", ValidationType::URL, null);
runTest("n", "schema errato", "htt://bad.com", ValidationType::URL, null);
runTest("n", "manca il dominio", "http://", ValidationType::URL, null);
runTest("n", "manca il dominio", "https://", ValidationType::URL, null);
runTest("n", "manca lo schema", "example.com", ValidationType::URL, null);
runTest("n", "spazio nel dominio", "https://exa mple.com", ValidationType::URL, null);
runTest("n", "underscore nel dominio", "https://exa_mple.com", ValidationType::URL, null);
runTest("n", "termina con punto", "https://example.com.", ValidationType::URL, null);
runTest("n", "doppio punto", "https://example..com", ValidationType::URL, null);
print "<br>";

// ALPHA
echo "ALPHA:<br>";
runTest("y", "","AbcDEF", ValidationType::ALPHA, null);
runTest("n", "", "abc123", ValidationType::ALPHA, null);
print "<br>";

// ALPHANUMERIC
echo "ALPHANUMERIC:<br>";
runTest("y", "","Abc123", ValidationType::ALPHANUMERIC, null);
runTest("n", "", "abc!123", ValidationType::ALPHANUMERIC, null);
print "<br>";

// CUSTOM_SET (caratteri consentiti: a, b, c, $)
echo "CUSTOM_SET:<br>";
$caratteriAmmessi = "abc£"; 
runTest("y", "","abcaaacccca£", ValidationType::CUSTOM_SET, $caratteriAmmessi);
runTest("n", "", "abdx", ValidationType::CUSTOM_SET, $caratteriAmmessi);

$gender = "";
runTest("n", "", $gender, ValidationType::CUSTOM_SET, "MF");

print "<br>";

// MATCHES
echo "MATCHES:<br>";
$match = "secret";
runTest("y", "","secret", ValidationType::MATCHES, $match);
runTest("n", "", "other", ValidationType::MATCHES, $match);
print "<br>";

// DATE
echo "DATE:<br>";
runTest("y", "","2025-10-21", ValidationType::DATE, null);

runTest("n", "", "2025-1-21", ValidationType::DATE, null);
runTest("n", "", "2025-12-40", ValidationType::DATE, null);
runTest("n", "", "2025-13-04", ValidationType::DATE, null);
runTest("n", "", "2025/10/21", ValidationType::DATE, null);
runTest("n", "", "10/10/25", ValidationType::DATE, null);


print "<br>";

?>

</body>
</html>





