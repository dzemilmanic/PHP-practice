<?php
session_start();

$username = $_GET['username'];
$password = $_GET['password'];
if($username == 'student' && $password == 'dunp'){
    $_SESSION['username'] = $username;
    echo "Dobrodosao, $username!";
}
else{
    echo "Pogresno korisnicko ime ili lozinka";
}
?>