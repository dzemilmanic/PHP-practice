<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="primer1.php" method="GET">
    <input type="number" name="dan" min="1" max="31" placeholder="Unesite dan" required value="<?php echo isset($_GET['dan']) ? htmlspecialchars($_GET['dan']) : ''; ?>">
    <input type="number" name="mesec" min="1" max="12" placeholder="Unesite mesec" required value="<?php echo isset($_GET['mesec']) ? htmlspecialchars($_GET['mesec']) : ''; ?>">
    <input type="number" name="godina" min="1900" max="2025" placeholder="Unesite godinu" required value="<?php echo isset($_GET['godina']) ? htmlspecialchars($_GET['godina']) : ''; ?>">
    <input type="submit" value="Unesi">
    </form>
</body>
</html>
<?php
$trenutno = time();
$rodjendan = mktime(0, 0, 0, $_GET['mesec'], $_GET['dan'], $_GET['godina']);
$proslo = ($trenutno - $rodjendan) / (60 * 60 * 24);
echo "Od vaseg rodjenja proslo je " . $proslo . " dana.";
?>