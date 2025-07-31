<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "pia";
 
        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $br_artikala_po_str = 5;
        $strana = isset($_GET['strana']) ? (int)$_GET['strana'] : 1;
        $ukupno_artikala = 0;
        
        $sql = "SELECT * FROM Artikli2";
        $result = $conn->query($sql);
        if ($result) {
            $ukupno_artikala = $result->num_rows;
        }

        $ukupno_strana = ceil($ukupno_artikala / $br_artikala_po_str);
        $offset = $strana * $br_artikala_po_str - $br_artikala_po_str;

        $stmt = $conn->prepare("SELECT * FROM Artikli2 LIMIT ? OFFSET ?");
        $stmt->bind_param("ii", $br_artikala_po_str, $offset);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Naziv</th>";
            echo "<th>Opis</th>";
            echo "</tr>";
            while($artikal = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$artikal['ime']}</td>";
                echo "<td>{$artikal['opis']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        for ($i = 1; $i <= $ukupno_strana; $i++) {
            if($i == $strana){
                echo "<strong>$i</strong> ";
            } else {
                echo "<a href='?strana=$i'>$i</a> ";
            }
        }
        
    ?>
</body>
</html>