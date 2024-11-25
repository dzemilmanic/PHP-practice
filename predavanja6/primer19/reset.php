<?php

    include_once "baza/db.php"; 
    include_once "baza/maildb.php";
     
	if (isset($_POST["kod"]) && isset($_POST["email"]) && isset($_POST["lozinka1"]) && isset($_POST["lozinka2"])) {
    $email = $_POST["email"];
    $lozinka1 = $_POST["lozinka1"];
    $lozinka2 = $_POST["lozinka2"];
	if(strcmp($lozinka1, $lozinka2)!== 0) 
		$greska .= " Lozinke se ne poklapaju. ";
	 $kod = $_POST["kod"];
	}
	
   
    //Upisuju se podaci za validaciju u tabelu
    $anketa=veza();
	if(postoji_verifikacioni_kod_e($anketa,$email,$kod)>0)
	{
	 if(promeni_lozinku_e($anketa,$email,$lozinka1))
	 {
		  if(!brisanje_verifikacionog_koda($anketa,'korisnik',$kod))
			 echo '<script> alert("Greška pri brisanju koda!")</script>';
		 
		 echo '<script> if (confim("Vaša lozinka je uspešno promenjena!")){
                        location.href = "login.php";    </script>';
		 
	 }
	 else	 
		  echo '<script> alert("GREŠKA: Vaša lozinka nije promenjena!")</script>';
		 
	}
	 else
		  echo '<script> alert("Nevalidnan kod!")</script>';
     	 
	raskid_veze($anketa);	
	
	
	
    
?>