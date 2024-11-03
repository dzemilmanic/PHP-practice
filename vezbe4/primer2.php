<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $studenti = [
        "036013" => ["ime" => "Dzemil", "prezime" => "Manic"],
        "036048" => ["ime" => "Ilhan", "prezime" => "Basic"],
        "036039" => ["ime" => "Hamza", "prezime" => "Gorcevic"]
    ];
    echo "<table border = 1>";
    foreach ($studenti as $br_indeksa => $ime) {
        echo "<tr>";
        echo "<td>{$br_indeksa}</td>";
        echo "<td>{$ime['ime']}</td>";
        echo "<td>{$ime['prezime']}</td>";
        echo "</tr>";
    };
    
    ?>
</body>
</html>