<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (!isset($_COOKIE['username'])) {
    ?>
    <form action="2.php" method="POST">
        <p>
            <label for="username"> Unesite korisnicko ime</label>
            <input type="text" name="username" id="username" required>
        </p>
        <p>
            <label for="password"> Unesite lozinku</label>
            <input type="password" name="password" id="password" required>
        </p>
        <p>
            <input type="submit" value="Prijavi se">
        </p>
    </form>
    <?php
} else {
   echo "Dobrodosao student";
   echo "<br>";
   echo "<a href='3.php'>" . "Odjavi se" . "</a>";
}
?>
</body>
</html>