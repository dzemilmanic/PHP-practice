<?php
require 'baza.php';
$id = '';
$ime = isset($_POST['ime']) ? $_POST['ime'] : '';
$prezime = isset($_POST['prezime']) ? $_POST['prezime'] : '';
$poruka = isset($_POST['poruka']) ? $_POST['poruka'] : '';
$datum = date("Y-m-d");

if(isset($_POST['ime']) && empty($_POST['id']) && isset($_POST['prezime']) && isset($_POST['poruka'])) {
    $sql = "INSERT INTO chat2 (ime, prezime, poruka, datum) VALUES('$ime', '$prezime', '$poruka', '$datum')";
    if($conn->query($sql) === TRUE){
        echo "Podaci uspesno uneti u bazu";
    }
    else{
        echo "Greska: " . $conn->error;
    } 
} 

if(isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['poruka'])) {
    $id = $_POST['id'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $poruka = $_POST['poruka'];
    $sql4 = "UPDATE chat2 SET ime='$ime', prezime='$prezime', poruka='$poruka' WHERE id=$id";
    if($conn->query($sql4) === TRUE){
        echo "Podaci su uspesno izmenjeni";
    }
    else{
        echo "Greska: " . $conn->error;
    }
} 

if(isset($_GET['id']) && $_GET['akcija'] =="uredi"){
    $id = $_GET['id'];
    $sql3 = "SELECT * FROM chat2 WHERE id=$id";
    $result2 = $conn->query($sql3);
    if($result2->num_rows > 0){
        $row = $result2->fetch_assoc();
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
    <title>Document</title>
</head>
<body>
    <form action="chat.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <p>
            <label for="ime">Unesite ime</label>
            <input type="text" name="ime" id="ime" required value="<?php echo $ime; ?>">
        </p>
        <p>
            <label for="prezime">Unesite prezime</label>
            <input type="text" name="prezime" id="prezime" required value="<?php echo $prezime; ?>"> 
        </p>
        <p>
            <label for="poruka">Unesite poruku</label>
            <input type="text" name="poruka" id="poruka" required value="<?php echo $poruka; ?>">
        </p>
        <p>
            <input type="submit" value="Pošalji">
        </p>
    </form>
    <?php
        $sql2 = "SELECT * FROM chat2";
        $result = $conn->query($sql2);
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Ime</th>";
            echo "<th>Prezime</th>";
            echo "<th>Poruka</th>";
            echo "<th>Datum</th>";
            echo "<th>Brisi</th>";
            echo "</tr>";
            while($row = $result->fetch_assoc()) {
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
        }

        if(isset($_GET['id']) && $_GET['akcija']=="brisi"){
            $id = $_GET['id'];
            $delete = "DELETE FROM chat2 WHERE id=$id";
            if($conn->query($delete)){
                echo "Brisanje je uspesno izvrseno";
            }
            else{
                echo "Greska prilikom brisanja";
            }
        }

       



    ?>
</body>
</html>