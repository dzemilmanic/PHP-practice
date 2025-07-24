<?php
if(isset($_POST['ime']) && isset($_POST['aktivnost'])) {
    $ime = $_POST['ime'];
    $aktivnost = $_POST['aktivnost'];
    $datum = date('Y-m-d');
    $file = fopen('aktivnosti.txt', 'a');
    if($file){
        fputs($file, "Ime studenta: $ime, Aktivnost: $aktivnost, Datum: $datum\n");
        echo "aktivnost uspesno sacuvana!";
    }
    fclose($file);
}
?>