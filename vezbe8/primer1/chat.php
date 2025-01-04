
<?php
require "baza.php";

$ime = "";
$prezime = "";  
$poruka = "";
$datum = date("Y-m-d H:i:s");

if(isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['poruka'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];  
    $poruka = $_POST['poruka'];
    $sql = "INSERT INTO chat (ime, prezime, poruka, datum) VALUES ('$ime', '$prezime', '$poruka', '$datum')";
    if($conn->query($sql) === TRUE) {
        echo "Poruka je uspešno poslata!<br>";
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT</title>
</head>
<body>
    <form action="chat.php" method="POST">
        <label for="ime">Ime:</label><br>
        <input type="text" id="ime" name="ime" required><br><br>
        <label for="ime">Prezime:</label><br>
        <input type="text" id="prezime" name="prezime" required><br><br>
        <label for="poruka">Poruka:</label><br>
        <textarea id="poruka" name="poruka" required rows="4" cols="50"></textarea><br><br>
        <input type="submit" name="submit"></button>
    </form>
    <?php
    $query = "SELECT * FROM chat";
    $result = $conn->query($sql);

    if(isset($_GET['id']) && $_GET['akcija']=="brisi"){
        $id = $_GET['id'];
        $delete = "DELETE FROM chat WHERE id=$id";
        if($conn->query($delete)){
            echo "Brisanje je uspesno";
        }
        else{
            echo "Greska prilikom brisanja";
        }
    }

    if($result->num_rows > 0){
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>Ime</th>";
        echo "<th>Prezime</th>";
        echo "<th>Poruka</th>";
        echo "<th>Datum</th>";
        echo "</tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr>";
                echo "<td>{$row['ime']}</td>";
                echo "<td>$row{['prezime']}</td>";
                echo "<td>$row{['poruka']}</td>";
                echo "<td>$row{['datum']}</td>";
                echo "<td><a href='chat.php?id={$row['id']}'>Brisi</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "Nema podataka u bazi";
    }
    $conn->close();
    
    ?>
</body>
</html>