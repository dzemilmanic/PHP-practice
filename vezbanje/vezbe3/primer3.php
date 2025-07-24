<?php 
function kreiraj_tabelu($redovi, $kolone){
    echo "<table border='1'>";
    echo "<thead><tr>";
    for($k = 0; $k < $kolone; $k++){
        echo "<th> Kolona " . ($k + 1) . "</th>";
    }
    echo "</tr></thead>";
    echo "<tbody>";
    for ($i = 0; $i < $redovi; $i++){
        echo "<tr>";
        for($j = 0; $j < $kolone; $j++){
            echo "<td>" . $j . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
kreiraj_tabelu(5, 3);
echo "<br>";
kreiraj_tabelu(2, 4);
?>