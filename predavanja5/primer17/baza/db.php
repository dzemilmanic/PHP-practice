<?php

	function veza()
	{
		c = new mysqli('localhost', 'korisnik1', 'lozinka','anketa');

		if($konekcija->connect_error)
			die('Greška prilikom konekcije');

		return $konekcija;
	}
	/*Upisivanje novog korisnika*/ 
	function upis_korisnika($konekcija,$korisnicko_ime,$ime,$prezime,$email,$lozinka,$adresa,$jmbg,$telefon,$thefile_name)
	{
		
		$kriptovanalozinka = md5($lozinka);
		$sql="INSERT INTO korisnik (korisnicko_ime, ime, prezime, email, lozinka, adresa, jmbg, telefon,slika, tip_korisnika) 
		      VALUES
             ('$korisnicko_ime','$ime','$prezime','$email','$kriptovanalozinka','$adresa','$jmbg','$telefon','slike/$thefile_name','korisnik')"
        $konekcija->query($sql);
	}
	
function broj_korisnika($konekcija,$korisnik,$lozinka)
	{
              $sql=" SELECT *  FROM korisnik 
                            WHERE  
                           korisnicko_ime='$korisnik' 
                           AND lozinka='$lozinka' ";
             $rezultat=$konekcija->query($sql);
           return $rezultat->num_rows;
          }
	

	function raskid_veze($konekcija)
	{
		$konekcija->close();
	}
	
?>