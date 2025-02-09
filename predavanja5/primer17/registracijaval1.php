<?php

$greska = "<p>Još niste registrovani</p>";
if (isset($_POST["ime"]) && isset($_POST["prezime"]) && isset($_POST["email"]) && isset($_POST["korisnicko_ime"]) && isset($_POST["lozinka1"]) && isset($_POST["lozinka2"])) {
    $greska="";
	$ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $email = $_POST["email"];
    $korisnicko_ime = $_POST["korisnicko_ime"];
    $lozinka1 = $_POST["lozinka1"];
    $lozinka2 = $_POST["lozinka2"];
    $adresa = "";
    if (isset($_POST["adresa"]))
        $adresa = $_POST["adresa"];
    $jmbg = "";
    if (isset($_POST["JMBG"]))
        $jmbg = $_POST["JMBG"];
    $telefon = "";
    if (isset($_POST["telefon"]))
        $telefon = $_POST["telefon"];
	/* $_FILES-asocijativni niz stavki otpremljenih u trenutnu skriptu preko HTTP POST metode. 
	 * prva dimenzija naziv odgovarajućeg input elementa za upload fajla
	 * druga dimenzija predstavlja naziv određenog atributa fajla.
	 * $_FILES["slika"]["tmp_name"] -lokacija fajla na serveru
	 * $_FILES["slika"]["name"]-orginalno ime fajla naračunaru korisnika
	 * $_FILES["slika"]["size"]-veličina fajla u B
	 * $_FILES["slika"]["type"]-tip datoteke (ako postoji)
     * $_FILES["slika"]["error"]-podaci o grešci */
	if($_FILES["slika"]["error"]== UPLOAD_ERR_OK){
     $thefile=$_FILES["slika"]["tmp_name"];
	 $thefile_name=$_FILES["slika"]["name"];
	 $thefile_size=$_FILES["slika"]["size"];
	 $thefile_type=$_FILES["slika"]["type"];
	 }
	 else
		 $greska .= "Došlo je do greške pri uploadu slike: ". $_FILES["slika"]["error"];
	
	/* Proveravamo da li je korisnik izabrao fajl*/        
    if ( !empty( $thefile_name ) ) 
    {
		/* Proveravamo da li učitana slika odgovovarajućeg formata*/
        if ( ( $thefile_type == "image/gif" ) || 
             ( $thefile_type == "image/pjpeg" ) || 
             ( $thefile_type == "image/jpeg" ) )
        {
            
			/* Proveravamo da li učitana slika odgovovarajuće veličine*/
			if ( $thefile_size < ( 1024 * 100 ) )
            {
                move_uploaded_file($thefile, "slike/$thefile_name");
            }
            else
            {
                $greska .= "Fajl je prevelik";
            }
        }
        else
        {   
            $greska .= "Fajl nije u odgovarajućem formatu";
        }
    }
    else
    {
        $greska .= "Niste izabrali sliku";
    }
	
	
	/* Ukoliko je otkrivena greška  štampa se poruka o njoj*/
	if ( $greska != "" )
    {
        print( "<b>Došlo je do greške</b>: $greska<br>" );
    }
    else
    {    
        /*Rezultat pozivanja fajla upisi.php biće prikazan u sledećem primeru */ 
        include "upisi.php";
        print( "Registrovani ste kao: $ime $prezime" );
        print( "<img src=\"slike/$thefile_name\" border=\"0\">" );
    }
}
?>

