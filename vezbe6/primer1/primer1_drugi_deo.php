<?php
$username = $_POST['username'];
$password = $_POST['password'];
if($username == "student" && $password = "dunp"){
    setcookie("username", $username, time() + 60,"/");
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
</body>
</html>