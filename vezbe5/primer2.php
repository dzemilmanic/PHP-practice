<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="primer2.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file[]" multiple>
        <input type="submit" name="submit">
    </form>
</body>
</html>
    <?php
    if (isset($_FILES['file'])) {
        foreach ($_FILES['file']['name'] as $key => $name) {
            
            $fileType = $_FILES['file']['type'][$key];
            
            if ($fileType == 'image/jpeg') {
                echo "Fajl " . $name . " je JPG fajl.<br>";
            } else {
                echo "Fajl " . $name . " NIJE JPG fajl.<br>";
            }
            
            $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            if ($extension == 'jpg' || $extension == 'jpeg') {
                echo "Fajl " . $name . " ima .jpg ili .jpeg ekstenziju.<br><br>";
            } else {
                echo "Fajl " . $name . " nema .jpg ili .jpeg ekstenziju.<br><br>";
            }
        }
    }
    ?>