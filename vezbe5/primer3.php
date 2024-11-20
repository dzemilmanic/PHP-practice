<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="primer3.php" method="get">
        <p>
            <label for="ime">Ime</label>
            <input type="text" name="ime" id="ime" value="<?php echo isset($_GET['ime']) ? ($_GET['ime']) : '';?>">
        </p>
        <p>
            <label for="dan">Dan</label>
            <input type="number" min="1" max="31" name="dan" id="dan" value="<?php echo isset($_GET['dan']) ? ($_GET['dan']) : '';?>">
        </p>
        <p>
            <label for="mesec">Mesec</label>
            <input type="text" min="1" max="12" name="mesec" id="mesec" value="<?php echo isset($_GET['mesec']) ? ($_GET['mesec']) : '';?>">
        </p>
        <p>
            <label for="godina">Godina</label>
            <input type="text" min="1900" max="2024" name="godina" id="godina" value="<?php echo isset($_GET['godina']) ? ($_GET['godina']) : '';?>">
        </p>
        <p>
            <input type="submit" name="" id="">
        </p>
    </form>
    <?php
    if (isset($_GET['ime'], $_GET['dan'], $_GET['mesec'], $_GET['godina'])) {
        $ime = $_GET['ime'];
        $dan = $_GET['dan'];
        $mesec = $_GET['mesec'];
        $godina = $_GET['godina'];
        $file = fopen("studenti.txt", 'a') or die("Unable to open file!");
        fputs($file, "$ime,$dan,$mesec,$godina\n");
        fclose($file);
        $file2 = fopen("studenti.txt", 'r');
        while(!feof($file2)){
            echo fgets($file2). "<br>";
        }
        fclose($file2);
    } 
    else 
    {
        echo "<p>Popunite sve podatke u formi</p>";
    }
?>
</body>
</html>