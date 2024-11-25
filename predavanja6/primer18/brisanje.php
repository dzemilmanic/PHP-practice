<?php 
    session_start();
    include_once "baza/db.php";
	$korisnicko_ime=$_SESSION["korisnik"];
?>
 <script> 
   if (confirm("Da li ste sigurni da želite da obrišete nalog?")) {
        
			location.href = "brisi.php"; 		
        }
   else
			
         location.href = "index.php"; 
 </script>;



