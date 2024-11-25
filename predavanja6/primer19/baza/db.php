<?php

	function veza()
	{
		$konekcija = new mysqli('localhost', 'korisnik1', 'lozinka','anketa');

		if($konekcija->connect_error)
			die('Greška prilikom konekcije');

		return $konekcija;
	}
	
    function broj_korisnika($konekcija,$korisnik,$lozinka)
	{
        $kriptovanalozinka = md5($lozinka);     
         $sql=" SELECT *  FROM korisnik 
                            WHERE  
                           korisnicko_ime='$korisnik' 
                           AND lozinka='$kriptovanalozinka' ";
             $rezultat=$konekcija->query($sql);
           return $rezultat->num_rows;
          }
		  
		  
	function  podaci_korisnika($konekcija,$korisnik)
	{
         $sql=" SELECT ime, prezime, email, adresa, jmbg, telefon, slika, tip_korisnika  FROM Korisnik 
                WHERE  
                korisnicko_ime='$korisnik'";
             $rezultat=$konekcija->query($sql);
           return $rezultat;
          }
		  
		  function  broj_korisnik_email($konekcija,$korisnik,$email)
	{
         $sql=" SELECT *  FROM korisnik 
                            WHERE  
                           korisnicko_ime='$korisnik' 
                           or email='$email' ";
             $rezultat=$konekcija->query($sql);
           return $rezultat->num_rows;
          }
	/*Upisivanje novog korisnika*/ 
	function upis_korisnika($konekcija,$korisnicko_ime,$ime,$prezime,$email,$lozinka,$adresa,$jmbg,$telefon,$thefile_name)
	{
		
		$kriptovanalozinka = md5($lozinka);
		$sql="INSERT INTO korisnik (korisnicko_ime, ime, prezime, email, lozinka, adresa, jmbg, telefon,slika, tip_korisnika) 
		      VALUES
             ('$korisnicko_ime','$ime','$prezime','$email','$kriptovanalozinka','$adresa','$jmbg','$telefon','slike/$thefile_name','korisnik')";
        return ($konekcija->query($sql));
	}
    /*Izmeni podatke korisnika*/ 
	function promeni_podatke_korisnika($konekcija,$korisnicko_ime,$ime,$prezime,$adresa,$jmbg,$telefon,$thefile_name)
	{
		$sql="UPDATE  Korisnik  SET 
		     ime='$ime', prezime='$prezime', adresa='$adresa', jmbg='$jmbg', telefon='$telefon', slika='$thefile_name', tip_korisnika='korisnik' 
		     WHERE  
                korisnicko_ime='$korisnicko_ime'";
        return ($konekcija->query($sql));
	}
    
	 /*Izmeni lozinku korisnika*/ 
	function promeni_lozinku($konekcija,$korisnicko_ime,$lozinka_stara,$lozinka)
	{   $kriptovanalozinka = md5($lozinka_stara);     
        $kriptovanalozinka1 = md5($lozinka);
		$sql="UPDATE  korisnik  SET 
		     lozinka='$kriptovanalozinka1'
			 WHERE
              korisnicko_ime='$korisnicko_ime' 
              AND lozinka='$kriptovanalozinka' ";
        $rezultat=$konekcija->query($sql);
        return $rezultat;
	}
	
	
	function brisanje_korisnika($konekcija,$korisnicko_ime){
		 $sql=" DELETE  FROM Korisnik 
                WHERE  
                korisnicko_ime='$korisnicko_ime'";
             $rezultat=$konekcija->query($sql);
           return $rezultat;		
	}
	
	function raskid_veze($konekcija)
	{
		$konekcija->close();
	}
	
?>