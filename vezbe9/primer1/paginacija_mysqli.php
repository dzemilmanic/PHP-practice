<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "pia";

$conn = new mysqli($server_name, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Greska pri konekciji sa bazom: " . $conn->connect_error);
}

$br_artikala_po_strani = 10;
$trenutna_strana = isset($_GET['strana']) ? (int)$_GET['strana'] : 1;
$offset = ($trenutna_strana - 1) * $br_artikala_po_strani;

$sql = "SELECT COUNT(*) AS ukupno FROM Artikli";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$ukupno_artikala = $row['ukupno'];

$ukupno_strana = ceil($ukupno_artikala / $br_artikala_po_strani);

$sql = "SELECT * FROM Artikli LIMIT $br_artikala_po_strani OFFSET $offset";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' style='width: 100%; border-collapse: collapse;'>";
    echo "<thead><tr><th>ID</th><th>Naziv</th><th>Opis</th><th>Sortiranje</th></tr></thead><tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['Id']}</td>";
        echo "<td>{$row['Naziv']}</td>";
        echo "<td>{$row['Opis']}</td>";
        echo "<td>{$row['Sortiranje']}</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>Nema dostupnih artikala.</p>";
}

if ($ukupno_strana > 1) {
    echo "<nav style='margin-top: 20px;'><ul style='list-style: none; display: flex; gap: 5px;'>";
    for ($i = 1; $i <= $ukupno_strana; $i++) {
        if ($i == $trenutna_strana) {
            echo "<li style='font-weight: bold;'>$i</li>";
        } else {
            echo "<li><a href='?strana=$i' style='text-decoration: none;'>$i</a></li>";
        }
    }
    echo "</ul></nav>";
}

$conn->close();

?>
