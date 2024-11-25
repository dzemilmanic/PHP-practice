<?php
$name = ($_POST['name']);
$selected = ($_POST['selected']);
if($name !== '' && $selected !== ''){
    $file = fopen("aktivnosti.txt", 'a');
    $datum = date('Y-m-d');
    $line = "Ime studenta: $name, Aktivnost: $selected, Datum: $datum";
    if($file)
        fputs($file, $line);
    
    fclose($file);
    echo "Aktivnost je uspesno sacuvana";
}
?>