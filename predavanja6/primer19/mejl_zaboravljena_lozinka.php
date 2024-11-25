<?php
include_once "baza/db.php"; 
include_once "baza/maildb.php"; 
if(!isset($_POST['email'])){
        exit("Nije pronađen mejl za promenu lozinke.");
    }


//Preuzimaju se prosleđeni podaci
		
$to_email = $_POST['email'];


//Kreiranje jedinstvenog koda
$kod = uniqid(true);

//Upisuju se podaci za validaciju u tabelu
$anketa=veza();
upis_verifikacionog_koda($anketa,'korisnik',$to_email,$kod);
raskid_veze($anketa);


/* Kreiramo link do skripte za verifikaciju mejla*/
$url="http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/nova_lozinka.php?kod=$kod&email=$to_email";

/* Kreiramo telo elektronske poruke*/
$body    = "
        <h2 style='font-weight:400;'>
            Da bi ste promenili lozinku pokrenite link: <br>
           
            <a href=".$url.">Promeni lozinku!!!</a>
            . 
        </h2>";
echo $url;

/* Predmet elektronske poruke*/
$subject = "Promena lozinke";

/* Da bi poslali mejl čiji sadržaj je HTML moramo u poruku ubaciti dodatna polja koja opisuju format poruke*/

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

//Dodajemo primaoca i pošiljaoca
$headers[] = 'To: $to_email';
$headers[] = 'From: programiranje.ia@gmail.com';

// Funkcija mail vrši slanje mejla 
if (mail($to_email, $subject, $body, implode("\r\n", $headers))) {

echo " Poruka za promenu lozinke poslata je na  $to_email...";}
else { echo "Problem pri slanju poruke za registraciju!"; }
?>