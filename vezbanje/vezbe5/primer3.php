<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="primer3.php" method="GET">
        <p>
            <label for="ime">Unesite ime</label>
            <input type="text" name="ime" id="ime" required value="<?php echo isset($_GET['ime']) ? $_GET['ime'] : ''; ?>">
        </p>
        <p>
            <label for="dan">Unesite dan</label>
            <input type="number" name="dan" id="dan" min="1" max="31" required value="<?php echo isset($_GET['dan']) ? $_GET['dan'] : ''; ?>">
        </p>
        <p>
            <label for="mesec">Unesite mesec</label>
            <input type="number" name="mesec" id="mesec" min="1" max="12" required value="<?php echo isset($_GET['mesec']) ? $_GET['mesec'] : ''; ?>">
        </p>
        <p>
            <label for="godina">Unesite godinu</label>
            <input type="number" name="godina" id="godina" min="1900" max="2025" required value="<?php echo isset($_GET['godina']) ? $_GET['godina'] : ''; ?>">
        </p>
        <p>
            <input type="submit" value="Unesi">
        </p>
    </form>
</body>
</html>

<?php
if(isset($_GET['ime']) && isset($_GET['dan']) && isset($_GET['mesec']) && isset($_GET['godina'])) {
    $ime = $_GET['ime'];
    $dan = $_GET['dan'];
    $mesec = $_GET['mesec'];
    $godina = $_GET['godina'];

    $file = fopen("studenti.txt", "a") or die("Ne mogu da otvorim fajl!");
    fputs($file, "Ime: $ime, Datum: $dan/$mesec/$godina\n");
    fclose($file);
    echo "Podaci su uspešno sačuvani!";

    $file2 = fopen("studenti.txt", "r") or die("Ne mogu da otvorim fajl!");
    while(!feof($file2)){
        echo fgets($file2) . "<br>" ;
    }
    fclose($file2);
}
else{
    echo "Molimo vas da popunite sva polja.";
}
?>