<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "pia";

$conn = new mysqli($server_name, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Greska pri konekciji sa bazom: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO Artikli (naziv, opis, sortiranje) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $naziv, $opis, $sortiranje);

$artikli = [
    ["naziv" => "Artikal 1", "opis" => "Opis za Artikal 1", "sortiranje" => 10],
    ["naziv" => "Artikal 2", "opis" => "Opis za Artikal 2", "sortiranje" => 15],
    ["naziv" => "Artikal 3", "opis" => "Opis za Artikal 3", "sortiranje" => 20],
    ["naziv" => "Artikal 4", "opis" => "Opis za Artikal 4", "sortiranje" => 25],
    ["naziv" => "Artikal 5", "opis" => "Opis za Artikal 5", "sortiranje" => 30],
    ["naziv" => "Artikal 6", "opis" => "Opis za Artikal 6", "sortiranje" => 35],
    ["naziv" => "Artikal 7", "opis" => "Opis za Artikal 7", "sortiranje" => 40],
    ["naziv" => "Artikal 8", "opis" => "Opis za Artikal 8", "sortiranje" => 45],
    ["naziv" => "Artikal 9", "opis" => "Opis za Artikal 9", "sortiranje" => 50],
    ["naziv" => "Artikal 10", "opis" => "Opis za Artikal 10", "sortiranje" => 55],
    ["naziv" => "Artikal 11", "opis" => "Opis za Artikal 11", "sortiranje" => 60],
    ["naziv" => "Artikal 12", "opis" => "Opis za Artikal 12", "sortiranje" => 65],
    ["naziv" => "Artikal 13", "opis" => "Opis za Artikal 13", "sortiranje" => 70],
    ["naziv" => "Artikal 14", "opis" => "Opis za Artikal 14", "sortiranje" => 75],
    ["naziv" => "Artikal 15", "opis" => "Opis za Artikal 15", "sortiranje" => 80],
];

foreach ($artikli as $artikal) {
    $naziv = $artikal['naziv'];
    $opis = $artikal['opis'];
    $sortiranje = $artikal['sortiranje'];

    if ($stmt->execute()) {
        echo "Artikal $naziv uspešno dodat u bazu.<br>";
    } else {
        echo "Greška pri dodavanju artikla $naziv: " . $stmt->error . "<br>";
    }
}

$stmt->close();
$conn->close();

?>
