<?php
require "baza.php";

$ime = "";
$prezime = "";  
$poruka = "";
$datum = date("Y-m-d H:i:s");
$id = "";

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
if(isset($_POST['id']) && isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['poruka'])){
    $id = $_POST['id'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $poruka = $_POST['poruka'];
    $update = "UPDATE chat SET ime = '$ime', prezime = '$prezime', poruka = '$poruka' WHERE id = $id";
    if($conn->query($update) === TRUE){
        echo "Podaci su uspesno izmenjeni";
    }
    else{
        echo "Greska" . $conn->error;
    }
}

if(isset($_GET['id']) && ($_GET['akcija']) == 'uredi'){
    $id = $_GET['id'];
    $query = "SELECT * FROM chat WHERE id = $id";
    $result = $conn->query($query);
    if($result->num_rows > 0 ){
        $row = $result->fetch_assoc();
        $ime = $row['ime'];
        $prezime = $row['prezime'];
        $poruka = $row['poruka'];
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
    <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="ime">Ime:</label><br>
        <input type="text" id="ime" name="ime" value="<?php echo $ime; ?>" required><br><br>
        <label for="ime">Prezime:</label><br>
        <input type="text" id="prezime" name="prezime" value="<?php echo $prezime; ?>" required><br><br>
        <label for="poruka">Poruka:</label><br>
        <textarea id="poruka" name="poruka" required rows="4" cols="50"><?php echo $poruka; ?></textarea><br><br>
        <input type="submit" name="submit"></button>
    </form>
    <?php
    $query = "SELECT * FROM chat";
    $result = $conn->query($query);

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
                echo "<td>{$row['prezime']}</td>";
                echo "<td>{$row['poruka']}</td>";
                echo "<td>{$row['datum']}</td>";
                echo "<td><a href='chat.php?akcija=brisi&id={$row['id']}'>Brisi</a></td>";
                echo "<td><a href='chat.php?akcija=uredi&id={$row['id']}'>Uredi</a></td>";
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