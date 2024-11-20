<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if (isset($_GET["ime"])) {
        echo "<p> ime: {$_GET["ime"]}" . "<br>". "</p>";
    } else {
        echo "<p> ime nije definisano.</p>";
    }

    if (isset($_GET["prezime"])) {
        echo "<p> prezime: {$_GET["prezime"]}" . "<br>". "</p>";
    } else {
        echo "<p> prezime nije definisano.</p>";
    }

    if (isset($_GET["godina"])) {
        echo "<p> godina: {$_GET["godina"]}" . "<br>". "</p>";
    } else {
        echo "<p> godina nije definisana.</p>";
    }
?>

</body>
</html>