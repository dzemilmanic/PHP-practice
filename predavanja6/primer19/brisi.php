<?php 
    session_start();
    include_once "baza/db.php";
	$korisnicko_ime=$_SESSION["korisnik"];
    $anketa=veza(); 
      if ( brisanje_korisnika($anketa,$korisnicko_ime))
	   { echo '<script> alert("Uspešno brisanje naloga");</script>';
         session_destroy();
       } 
      else 
		 echo '<script> alert("Problem sa brisanjem");</script>'; 
	 raskid_veze($anketa);
     //echo '<a href="index.php"> <br>Vrati se na početnu stranu </a>';
      header("Location:index.php");
	  
	 ?> 