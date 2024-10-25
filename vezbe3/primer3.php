<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function kreiraj_tabelu($broj_redova, $broj_kolona) {
    echo "<table border = 1>";
    echo "<thead><tr>";
    for ($k = 1; $k <= $broj_kolona; $k++) {
        echo "<th>Kolona $k</th>";
    }
    echo "</tr></thead>";
    
    echo "<tbody>";
    for ($i = 1; $i <= $broj_redova; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $broj_kolona; $j++) {
            echo "<td>$i</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}

kreiraj_tabelu(10, 2);
kreiraj_tabelu(10, 3)
?>
</body>
</html>