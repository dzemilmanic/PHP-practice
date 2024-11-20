<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php
if(isset($_SESSION['username'])){
    echo "dobro dosao " . $_SESSION['username'] . "<br>";
    echo "<a href=\"primer3_treci_deo.php\">Logout";
}
else{
?>
    <form action="primer3_drugi_deo.php" method="post">
        <p> 
            <label for="username">Unesite username</label>
            <input type="text" name="username" id="username">
        </p>
        <p>
            <label for="password">Unesite password</label>
            <input type="password" name="password" id="password">
        </p>
        <p>
            <input type="submit" name="" id="">
        </p>
    </form>
    <?php
        };
        require 'primer3_brojac.php'
    ?>
</body>
</html>