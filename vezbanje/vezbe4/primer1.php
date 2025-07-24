<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $niz = ["036013" => "Dzemil Manic",
                  "036048" => "Ilhan Basic", 
                  "036042" => "Hamza Gorcevic"];
        echo "<table border='1'>";
        foreach($niz as $index => $name){
            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$index</td>";
            echo "</tr>";
        }
        echo "</table>";
    
    ?>
</body>
</html>