<?php

    include_once "baza/db.php"; 
    include_once "baza/maildb.php";

    if(!isset($_GET['kod'])){
        exit("Nije pronađen kod za potvrdu.");
    }
    if(!isset($_GET['email'])){
        exit("Nije pronađen mejl za potvrdu.");
    }
	
    if(!isset($_GET['korisnik'])){
        exit("Nije pronađeno krosničko ime za potvrdu.");
    }

    //Preuzimaju se prosleđeni podaci
    $kod = $_GET['kod'];
    $korisnik = $_GET['korisnik'];		
    $to_email = $_GET['email'];
   
    //Upisuju se podaci za validaciju u tabelu
    $anketa=veza();
	if(postoji_verifikacioni_kod($anketa,$korisnik,$to_email,$kod)>0)
	{
	 if(aktiviraj_korisnika($anketa,$korisnik)){
		 if(!brisanje_verifikacionog_koda($anketa,$korisnik,$kod))
			 echo '<script> alert("Greška pri brisanju koda!")</script>';
		 
		 echo '<script> alert("Korisnički nalog je aktiviran!")</script>';
		 
	 }
	 else
		  echo '<script> alert("Korisnički nalog nije aktiviran!")</script>';
     	 
	raskid_veze($anketa);	
	}
	else{
		raskid_veze($anketa);
		exit("Nije validan kod.");
	}
	
    
?>