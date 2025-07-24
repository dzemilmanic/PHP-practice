<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <?php
        for($redovi = 0; $redovi < 3; $redovi++){
            echo "<tr>";
            for($kolone = 0;  $kolone < 3; $kolone++){
                echo "<td>" . $kolone . "</td>";
            }
            echo "</tr>";
        } 
        ?>
    </table>
</body>
</html>