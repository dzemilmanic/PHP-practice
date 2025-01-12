<?php
$servarname = "localhost";
$username = "root";
$password = "";
$baza = "pia";

$conn = new mysqli($servarname, $username, $password, $baza);

if ($conn->connect_error) {
    die("Nije uspela konekcija sa bazom: " . $conn->connect_error);
}

$trenutna_strana = isset($_GET['strana']) ? $_GET['strana'] : 1;

$ukupno_artikala_query = "SELECT COUNT(*) as total FROM artikli";
$stmt = $conn->prepare($ukupno_artikala_query);
$stmt->execute();
$stmt->bind_result($total_rows);
$stmt->fetch();
$stmt->close();

$br_artikala_po_str = 10;
$ukupan_broj_strana = ceil($total_rows / $br_artikala_po_str);

if ($trenutna_strana < 1) $trenutna_strana = 1;
if ($trenutna_strana > $ukupan_broj_strana) $trenutna_strana = $ukupan_broj_strana;

$offset = ($trenutna_strana - 1) * $br_artikala_po_str;

$sql = "SELECT id, naziv, opis, sortiranje FROM artikli LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $br_artikala_po_str, $offset);
$stmt->execute();
$result = $stmt->get_result();


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
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['naziv']}</td>";
        echo "<td>{$row['opis']}</td>";
        echo "<td>{$row['sortiranje']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nema artikala u bazi.";
}

$stmt->close();

echo "<nav style='margin-top: 20px;'><ul style='list-style: none; display: flex; gap: 5px;'>";
    for ($i = 1; $i <= $ukupan_broj_strana; $i++) {
        if ($i == $trenutna_strana) {
            echo "<li style='font-weight: bold;'>$i</li>";
        } else {
            echo "<li><a href='?strana=$i' style='text-decoration: none;'>$i</a></li>";
        }
    }
    echo "</ul></nav>";

$conn->close();
?>