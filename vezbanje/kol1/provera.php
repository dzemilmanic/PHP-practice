<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == 'student' && $password == 'dunp'){
        $_SESSION['username'] = $username;
        echo "Dobrodosao, $username";
    }
    else{
        echo "Pogresno korisnicko ime ili lozinka";
    }
}
?>