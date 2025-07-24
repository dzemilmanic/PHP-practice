<?php 
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === 'student' && $password === 'dunp') {
        setcookie('username', $username, time() + 3600, '/');
        echo "Uspešno ste se prijavili kao $username.";
    }
    else {
        echo "Neispravno korisničko ime ili lozinka.";
    } 
}


?>