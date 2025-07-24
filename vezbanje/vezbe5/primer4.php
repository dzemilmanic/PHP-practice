<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="primer4.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file[]" accept=".jpg, image/jpeg" multiple>
        <input type="submit" name="" id="">
    </form>
</body>
</html>
<?php
if(isset($_FILES['file'])) {
    $upload_dir = __DIR__ . '/slike/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    foreach($_FILES['file']['tmp_name'] as $key => $tmp_name) {
        $original_name = $_FILES['file']['name'][$key];
        $file_type = mime_content_type($tmp_name);

        if($file_type === 'image/jpeg'){
            $timestamp = time() . rand(1000, 9999);
            $new_name = "slika-$timestamp.jpg";
            $destination = $upload_dir . $new_name;
            if(move_uploaded_file($tmp_name, $destination)) {
                echo "Uspešno uploadovana slika: $new_name<br>";
            } else {
                echo "Greška prilikom uploadovanja fajla: $original_name<br>";
            }
        }
    }
}
?>