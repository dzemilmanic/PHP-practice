<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_SESSION['username'])){

        echo "<a href=\"brise.php\">Logout</a>" . "<br>";
        echo "<a href=\"aktivnosti.php\">Dodaj aktivnosti</a>";
    }
    else{
    ?>
    <form action="provera.php" method="get">
        <p>
            <label for="username">Korisnicko ime</label>
            <input type="text" name="username" id="username">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </p>
        <p>
            <input type="submit" name="" id="">
        </p>
    </form>
    <?php
    }
    ?>
</body>
</html>

