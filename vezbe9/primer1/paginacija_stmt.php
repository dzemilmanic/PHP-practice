<?php
$servarname = "localhost";
$username = "root";
$password = "";
$baza = "pia";

// Kreiranje konekcije
$conn = new mysqli($servarname, $username, $password, $baza);
if ($conn->connect_error) {
    die("Nije uspela konekcija sa bazom: " . $conn->connect_error);
}

// Trenutna strana
$trenutna_strana = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Ukupan broj artikala
$ukupno_artikala_query = "SELECT COUNT(*) as total FROM artikli";
$ukupno_artikala = $conn->query($ukupno_artikala_query);
$total_rows = $ukupno_artikala->fetch_assoc()['total'];

// Artikli po stranici
$br_artikala_po_str = 10;
$ukupan_broj_strana = ceil($total_rows / $br_artikala_po_str);
// Osiguravanje da trenutna strana bude validna
if ($trenutna_strana < 1) $trenutna_strana = 1;
if ($trenutna_strana > $ukupan_broj_strana) $trenutna_strana = $ukupan_broj_strana;

// Računanje offseta
$offset = ($trenutna_strana - 1) * $br_artikala_po_str;

// Dohvatanje artikala za trenutnu stranu
$sql = "SELECT id, naziv, opis, sortiranje FROM artikli LIMIT $br_artikala_po_str OFFSET $offset";
$result = $conn->query($sql);

// Prikaz artikala
if ($result->num_rows > 0) {
    echo "<table border=1>";
    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Naziv</th>";
    echo "<th>Opis</th>";
    echo "<th>Sortiranje</th>";
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['Id']}</td>";
        echo "<td>{$row['Naziv']}</td>";
        echo "<td>{$row['Opis']}</td>";
        echo "<td>{$row['Sortiranje']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nema artikala u bazi.";
}
// Generisanje paginacije
echo "<div style='margin-top: 20px;'>";
for ($i = 1; $i <= $ukupan_broj_strana; $i++) {
    if ($i == $trenutna_strana) {
        echo "<strong>Strana $i</strong> ";
    } else {
        echo "<a href='?page=$i'>Strana $i</a> ";
    }
}
echo "</div>";
$conn->close();
?>