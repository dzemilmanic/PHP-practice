<?php
    /* Provera da li postoji aktivan odgovarajući kod za datog korisnika */
	function postoji_verifikacioni_kod($konekcija,$korisnik,$email,$kod)
	{
        $sql=" SELECT *  FROM Verifikacioni_kodovi 
                            WHERE  
                           korisnicko_ime='$korisnik' 
                           AND kod='$kod' 
						   AND email='$email'";
             $rezultat=$konekcija->query($sql);
           return $rezultat->num_rows;
          }
	/* Provera da li postoji aktivan odgovarajući kod za dati mejl  */
	function postoji_verifikacioni_kod_e($konekcija,$email,$kod)
	{
        $sql=" SELECT *  FROM Verifikacioni_kodovi 
                            WHERE  
                           kod='$kod' 
						   AND email='$email'";
             $rezultat=$konekcija->query($sql);
           return $rezultat->num_rows;
          }  
	
		 
	/*Upisivanje verifikacionog koda za odgovarajućeg korisnika i mejl*/ 
	function upis_verifikacionog_koda($konekcija,$korisnicko_ime,$email,$kod)
	{
		
		$sql="INSERT INTO `Verifikacioni_kodovi`(`korisnicko_ime`, `email`, `kod`) VALUES 
             ('$korisnicko_ime','$email','$kod')";
        return ($konekcija->query($sql));
	}
	
	/* Brisanje odgovarajućeg korisničkog koda iz tabele */
	function brisanje_verifikacionog_koda($konekcija,$korisnik,$kod){
		 $sql=" DELETE FROM Verifikacioni_kodovi
        		 WHERE 
				 korisnicko_ime='$korisnik' 
                 AND kod='$kod' ";
             $rezultat=$konekcija->query($sql);
           return $rezultat;		
	}
   /*Izmeni podatke o stanju korisničkog naloga na 'aktiviran' */ 
	function aktiviraj_korisnika($konekcija,$korisnicko_ime)
	{
		$sql="UPDATE  Korisnik  SET 
		     stanje='aktiviran' 
		     WHERE  
                korisnicko_ime='$korisnicko_ime'";
        return ($konekcija->query($sql));
	}
	
	 /*Izmeni lozinku korisnika na osnovu mejla*/ 
	function promeni_lozinku_e($konekcija,$email,$lozinka)
	{   $kriptovanalozinka = md5($lozinka);
		$sql="UPDATE  korisnik  SET 
		     lozinka='$kriptovanalozinka'
			 WHERE
              email='$email'  ";
        $rezultat=$konekcija->query($sql);
        return $rezultat;
	}
?>