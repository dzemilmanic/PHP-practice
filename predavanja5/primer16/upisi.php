<?php 
// Roditeljski direktorijum osnovnog direktorijuma za dokmente
   $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
   echo '<p style="color:red" >Vaši podaci su upisani na serveru na lokaciji:'.$DOCUMENT_ROOT.'</p>';

// Lokacija datoteke
   $lokacija_fajla=$DOCUMENT_ROOT."/registracija.txt";

// Otvara datoteku za dodavanje i čitanje od kraja postojećeg sadržaja ako ga ima; 
// ako datoteka ne postoji, sistem pokušava da je napravi
   $fregistracija = fopen($lokacija_fajla,'a+');
   fwrite ($fregistracija,$ime.",".$prezime.",".$email.",".$korisnicko_ime.",".$lozinka1.",".$adresa."\n");   
// Učitava datoteku u niz i svaki red datoteke smešta u zaseban element niza
   $fniz=file($lokacija_fajla);
//Niz imena kljucnih polja
   $polja=array("ime","prezime","email","korisnicko_ime","lozinka1","adresa");

//expolde koristeci  string separator podeli string u niz stringova 
//Stampamo dobijeni niz kome su dodeljeni string indeksi iz niza $polja
  foreach(  $fniz as $fred_str) {
    print_r(array_combine($polja,explode(",",$fred_str)));
	echo '</br>';
}

//Zatvara datoteku
   fclose($fregistracija);



 ?>