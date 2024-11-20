<?php
    $ime = "";
    $prezime = "";
    $godina = "";
    if(isset($_GET["ime"])){
        echo "<p> ime: {$_GET["ime"]}" . "<br>". "</p>";
        $ime = $_GET["ime"];
    }
    if(isset($_GET["prezime"])){
        echo "<p> prezime: {$_GET["prezime"]}" . "<br>". "</p>";
        $prezime = $_GET["prezime"];
    }
    if(isset($_GET["godina"])){
        echo "<p> godina: {$_GET["godina"]}" . "<br>". "</p>";
        $godina = $_GET["godina"];
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="forma.php" method="GET">
        <input type="text" name="ime" value="<?php echo $ime;?>">
        <input type="text" name="prezime" value="<?php echo $prezime;?>">
        <select name="godina">
            <option value="2003" <?php echo isset($_GET["godina"]) == "2003" ? "selected" : "";?>>2003</option>
            <option value="2004" <?php echo isset($_GET["godina"]) == "2004" ? "selected" : "";?>>2004</option>
            <option value="2005" <?php echo isset($_GET["godina"]) == "2005" ? "selected" : "";?>>2005</option>
        </select>
        <input type="submit" name="" id="">
    </form>
    
</body>
</html>