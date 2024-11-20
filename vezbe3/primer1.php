<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border=1,>
        <thead>
            <tr>
                <th>Kolona 1</th>
                <th>Kolona 2</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 1; $i <= 50; $i++) {
                if ($i == 10 || $i == 15)
                    continue;
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>" . ($i * $i) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>