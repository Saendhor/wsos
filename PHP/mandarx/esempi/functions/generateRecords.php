<?php
define ("DEBUG", 0);

function generateFantasyNames()
{
    $inizials = ["Al", "Bel", "Cor", "Dar", "El", "Fen", "Gal", "Hel", "Ith", "Jar", "Kel", "Lor", "Mor", "Nel", "Or", "Pel", "Qua", "Ryn", "Sel", "Tor", "Ul", "Var", "Wil", "Xan", "Yor", "Zel"];
    $middle = ["a", "e", "i", "o", "u", "ar", "en", "il", "or", "un", "al", "er", "ir", "ur", "an", "el", "ol", "in"];
    $finals = ["dor", "mir", "thas", "riel", "dan", "gorn", "nion", "dras", "thar", "vorn", "dil", "nor", "las", "rian", "thus", "dor", "lin", "mar", "tor", "vash"];

    return ucfirst($inizials[array_rand($inizials)] . (rand(0, 1) ? $middle[array_rand($middle)] : "") . $finals[array_rand($finals)]);
}

$domains =
[
    "@rivendell.elven",
    "@gondor.realm",
    "@rohan.riders",
    "@mordor.shadow",
    "@shire.hobbit",
    "@isengard.tower",
    "@erebor.mountain",
    "@lothlorien.forest",
    "@numenor.sea",
    "@angmar.wraith",
];

function addRecords($conn, $table, $quantity, $fields)
{
    $emailName = "";
    global $domains; // rende visibile la variabile definita fuori
    
    for ($i = 1; $i <= $quantity; $i++)
    {
        $values = [];
    
        if (DEBUG)
            echo "<br>Creating record $i:<br>";

        foreach ($fields as $field => $type)
        {
            switch (strtolower($type))
            {
                case 'name':
                case 'surname':
                    $values[$field] = generateFantasyNames();
                    if($emailName == "")
                        $emailName = $values[$field];
                    break;

                case 'string':
                    $values[$field] = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, rand(5, 10));
                    break;

                case 'age':
                    $values[$field] = rand(18, 90);
                    break;

                case 'integer':
                    $values[$field] = rand(0, 65536);
                    break;

                case 'float':
                    $values[$field] = number_format(rand(0, 10000) / 100, 2, '.', '');
                    break;

                case 'date':
                    $values[$field] = date('Y-m-d', strtotime('-' . rand(5000, 20000) . ' days'));
                    break;

                case 'email':
                    $values[$field] = lcfirst($emailName . $domains[array_rand($domains)]);
                    $emailName = "";
                    break;

                default:
                    $values[$field] = 'N/A';
                    break;
            }

            if (DEBUG)
                echo "&nbsp;&nbsp;$field = {$values[$field]} ($type)<br>";
        }

        // Build query dynamically
        $columns = implode(", ", array_keys($values));
        $vals = "'" . implode("', '", array_map('addslashes', $values)) . "'";
        $sql = "INSERT INTO $table ($columns) VALUES ($vals)";
        
        if (DEBUG)
            echo "&nbsp;&nbsp;SQL: $sql<br>";

        if (!$conn->query($sql))
        {
            echo "Error inserting record $i: " . $conn->error . "<br>";
            return -1;
        }
    }
    return $quantity;
}

function reachRecordQuantity($conn, $table, $quantity, $fields)
{
    $query = "SELECT COUNT(*) AS total FROM $table";
    if(DEBUG)
        echo $query;

    $res = $conn->query($query);
    $row = $res->fetch_assoc();
    $total = $row['total'];

    if ($total < $quantity)
    {
        return addRecords($conn, $table, $quantity - $total, $fields);
    }
    else
        return 0;
}



        
        
        

        

        
?>