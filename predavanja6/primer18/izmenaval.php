<?php 
    include_once "baza/db.php";
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $email = $_POST["email"];
    $korisnicko_ime = $_POST["korisnicko_ime"];
	$adresa = $_POST["adresa"];
    $jmbg = $_POST["JMBG"];
    $telefon = $_POST["telefon"];
	$promena_lozinke = 0;	
	$greska ="";	
	if (isset($_POST["lozinka_stara"]) && isset($_POST["lozinka1"]) && isset($_POST["lozinka2"])){
	$promena_lozinke = 1;	
	$lozinka_stara = $_POST["lozinka_stara"];
    $lozinka1 = $_POST["lozinka1"];
    $lozinka2 = $_POST["lozinka2"];
	if(strcmp($lozinka1, $lozinka2)!== 0) 
		$greska .= " Lozinke se ne poklapaju. ";
	}
    
	/* Proveravamo da li je korisnik izabrao novu sliku 
	 * i da li je uspešno preneta.
	 */
	
	
	if($_FILES["slika"]["error"]== UPLOAD_ERR_OK){
     $thefile=$_FILES["slika"]["tmp_name"];
	 $thefile_name=$_FILES["slika"]["name"];
	 $thefile_size=$_FILES["slika"]["size"];
	 $thefile_type=$_FILES["slika"]["type"];
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
				$thefile_name="slike/".$thefile_name;
            }
            else
            {
                $greska .= " Fajl je prevelik";
            }
        }
        else
        {   
            $greska .= " Fajl nije u odgovarajućem formatu";
        }
    }
    else
    {
        //ukoliko nije izabrana slika postavlja se stara lokacija
            $thefile_name= $_POST["thefile_name"];
    }
	 
	 }
	 else
		 $thefile_name= $_POST["thefile_name"];
	
	        
    
	
	
	/* Ukoliko je otkrivena greška  štampa se poruka o njoj*/
	if ( $greska != "" )
    {
        print( "<b>Došlo je do greške</b>: $greska<br>" );
    }
    else
    {    
         /*Upisivanje novog korisnika*/ 
        $anketa=veza();
		if(promeni_podatke_korisnika($anketa,$korisnicko_ime,$ime,$prezime,$adresa,$jmbg,$telefon,$thefile_name))
			echo 'Uspešno su promenjeni podaci o korisniku!</br>';
		if($promena_lozinke===1 && $lozinka1 !=""){
		  if ( broj_korisnika($anketa,$korisnicko_ime,$lozinka_stara)===1){
			promeni_lozinku($anketa,$korisnicko_ime,$lozinka_stara,$lozinka1);
		    echo 'Šifra je uspešno su promenjena!<br>';	}
	      else
			echo 'Promena šifre nije uspešna!<br>';	
	
	      }
	    else
		echo 'Šifra nije promenjena!<br>';	
	    	
        raskid_veze($anketa);
		
		echo '<a href="index.php"> <br>Vrati se na početnu stranu </a>';
    }
?>


