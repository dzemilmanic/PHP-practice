<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="unos.php" method="post">
        <label for="ime">Unesite ime</label>
        <input type="text" id="ime" name="ime" required>
        <br>
        <label for="aktivnost">Odaberite aktivnosti</label>
        <select name="aktivnost" id="aktivnost" required>
            <option value="prisustvo">Prisustvo</option>
            <option value="zadatak">Zadatak predat</option>
            <option value="test">Test uradjen</option>
        </select>
        <br>
        <input type="submit" value="Unesi">
    </form>

    <h2>Unete aktivnosti</h2>
    <?php
        $file2 = fopen('aktivnosti.txt', 'r');
        if($file2){
            echo "<table border='1'>";
            while(!feof($file2)){
                $line = fgets($file2);
                    echo "<tr>";
                    echo "<td>" . $line . "</td>";
                    echo "</tr>";
            }
            echo "</table>";
        }
        fclose($file2);
    ?>

</body>
</html>