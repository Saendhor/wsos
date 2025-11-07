<?php
function displayTable($conn, $table, $fields, $border = 0, $cellpadding = 0)
{
    if (empty($fields))
    {
        return -1;
    }

    $columns = implode(", ", $fields);
    $sql = "SELECT $columns FROM $table";
    $result = $conn->query($sql);

    if (!$result)
    {
        return -2;
    }

    if ($result->num_rows > 0)
    {
        echo "<table border='$border' cellpadding='$cellpadding'>";
        echo "<tr>";
        foreach ($fields as $field)
        {
            echo "<th>" . htmlspecialchars($field) . "</th>";
        }
        echo "</tr>";

        $rows = 0;
        while ($row = $result->fetch_assoc())
        {
            echo "<tr>";
            foreach ($fields as $field)
            {
                echo "<td>" . htmlspecialchars($row[$field]) . "</td>";
            }
            echo "</tr>";
            $rows++;
        }

        echo "</table><br>";

        return $rows;
    }
    else
    {
        return -3;
    }
}
?>