<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pia';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['ime']) && isset($_POST['opis'])) {
    $ime = $_POST['ime'];
    $opis = $_POST['opis'];

    $stmt = $conn->prepare("INSERT INTO Artikli2 (ime, opis) VALUES (?, ?)");
    $stmt->bind_param("ss", $ime, $opis);

    if($stmt->execute()){
        echo "Arikal $ime uspesno unet u bazu! <br>";
    }
    else {
        echo "Greška pri unosu artikla $ime: " . $stmt->error . "<br>";
    }
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
    <form action="form_stmt.php" method="POST">
        <p>
            <label for="ime">Unesite naziv artikla</label>
            <input type="text" name="ime" id="ime" required>
        </p>
        <p>
            <label for="opis">Unesite opis artikla</label>
            <input type="text" name="opis" id="opis" required>
        </p>
        <p>
            <input type="submit" value="Unesi artikal">
        </p>
    </form>
</body>
</html>