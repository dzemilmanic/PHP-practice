<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="unos.php" method="post">
        <p>
            <label for="name">Unesite ime</label>
            <input type="text" name="name" id="name">
        </p>
        <p>
            <select name="selected" id="">
                <option value="Prisustvo">Prisustvo</option>
                <option value="Zadatakpredat">Zadatak predat</option>
                <option value="Testuradjen">Test uradjen</option>
            </select>
        </p>
        <p>
            <input type="submit" name="" id="">
        </p>
    </form>
    
</body>
</html>
<?php
$file2 = fopen('aktivnosti.txt', 'r');
echo "<table border='1'>";
    echo "<tr>";
    while(!feof($file2)){
        echo "<td>". fgets($file2). "</td>" . "<br>";
    }
    echo "</tr>";
echo "</table>";
while(!feof($file2)){
    
}
?>