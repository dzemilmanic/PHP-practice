<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
if($username == "student" && $password == "dunp"){
    echo "Uspesno ste logovani";
    $_SESSION['username'] = $username;

}
else{
    echo "greska";
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