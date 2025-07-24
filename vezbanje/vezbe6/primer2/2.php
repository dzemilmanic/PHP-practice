<?php 
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === 'student' && $password === 'dunp') {
        $_SESSION['username'] = $username;
        echo "Uspešno ste se prijavili kao $username.";
    }
    else {
        echo "Neispravno korisničko ime ili lozinka.";
    } 
}


?>