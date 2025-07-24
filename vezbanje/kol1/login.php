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
    if(isset($_SESSION['username'])) {
        echo "<br><a href='logout.php'>Logout</a>";
        echo "<br><a href='aktivnosti.php'>Aktivnosti</a>";

    }
    else {
    ?>
    <h1>Login Page</h1>
    <form action="provera.php" method="post">
        <label for="username">Korisnicko ime:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Lozinka:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    <?php
    }
    ?>
</body>
</html>