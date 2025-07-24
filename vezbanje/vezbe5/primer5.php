<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="primer5.php" method="POST" enctype="multipart/form-data">
        <p>
            <label for="ime">Unesite ime slike</label>
            <input type="text" name="ime" id="ime" required>
        </p>
        <p>
            <label for="file">Izaberite sliku (JPEG)</label>
            <input type="file" name="file[]" id="file" accept=".jpg, image/jpeg" required>
        </p>
        <p>
            <input type="submit" value="Upload">
        </p>
    </form>
</body>
</html>
<?php
    if(isset($_FILES['file'])){
    $upload_dir = __DIR__ . '/slike/';
        if (!is_dir($upload_dir)) { 
            mkdir($upload_dir, 0777, true); 
        }
 
    foreach($_FILES['file']['tmp_name'] as $key => $tmp_name) {
        $file_type = mime_content_type($tmp_name);
        if($file_type === 'image/jpeg') {
            $new_name = $_POST['ime'];
            $destination = $upload_dir . $new_name . '.jpg';
            if(move_uploaded_file($tmp_name, $destination)) {
                echo "Uspešno uploadovana slika: $new_name.jpg<br>";
            } else {
                echo "Greška prilikom uploadovanja fajla: $new_name<br>";
            }
        }
    }
}
?>