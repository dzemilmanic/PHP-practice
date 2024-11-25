<?php 
    session_start();
    if (isset($_SESSION["korisnik"])){
    include "navigacija1.php";
	echo "Otvorena sesija korisnika  ". $_SESSION["korisnik"];
	}
   else
   {   
    //Ukoliko nije u toku sesija otvara se forma za logovanje
        header("Location:login.php");
   }

?>

<!-- Preuzimaju se podaci sa servera o ulogovanom korisniku-->
<?php include_once "baza/db.php"; 
  $korisnicko_ime=$_SESSION["korisnik"];
  $anketa=veza();
  $rezultat=podaci_korisnika($anketa,$korisnicko_ime);
  
  /* Metodu fetch_assoc() da obezbeđuje jedan po jedan red podataka,
   * koji se čuvaju u promenljivoj $korisnicki_podaci.
   * rezultat je asocijativni niz čiji su indeksi
   * imena polja izdvojenih sql upitom.
   */
  $korisnicki_podaci=$rezultat->fetch_assoc();
  $ime= $korisnicki_podaci['ime'];
  $email= $korisnicki_podaci['email'];
  $prezime = $korisnicki_podaci['prezime']; 
  $adresa= $korisnicki_podaci['adresa'];
  $jmbg= $korisnicki_podaci['jmbg'];
  $telefon= $korisnicki_podaci['telefon'];
  $thefile_name= $korisnicki_podaci['slika'];
  $tip_korisnika= $korisnicki_podaci['tip_korisnika'];
  raskid_veze($anketa);
?>
<main>
<!-- Forma u kojoj je uneto trenutno stanje podataka korisnika
  -- ukoliko kosnik želi da promeni podatke može sve osim
  -- korisničkog imena, email-a i tipa korisnika
  -->
<form action="izmenaval.php" method="post"  enctype="multipart/form-data">
    <div>
	    <div>
            <label>Tip korisnika - <?php echo $tip_korisnika; ?></label>
			
			<!-- Skriveno polje koje nosi informaciju o tipu korisnika  -->
			<input name="tip_korisnika" value="<?php echo $tip_korisnika; ?>" type="hidden" >
        </div>
        <div>
		    </br></br>
            <label>Ime</label>
            <input type="text"  name="ime" value="<?php echo $ime; ?>" >
        </div>
        <div>
		    </br>
            <label>Prezime</label>
            <input type="text"  name="prezime" value="<?php echo $prezime; ?>" >
        </div>
    </div>
	
	<!-- Korisnici se identifikuju pomoću korisničkog imena i email-a 
      -- pa je zabrenjeno editovanje polja sa opcijom readonly	
	  -->
    <div>
        <div>
		    </br>
            <label>Email*</label>
            <input type="email"  name="email" value="<?php echo $email; ?>" readonly>
        </div>
        <div>
            </br>
			<label>Korisničko ime*</label>
            <input type="text"  name="korisnicko_ime" value="<?php echo $korisnicko_ime; ?>" readonly>
        </div>
    </div>
	<!-- Ukoliko korisnik želi da promeni lozinku mora prvo uneti staru
	  -- a zatim potvditi novu lozinku
	  -->
    <div>
    </br>
	<label>Za promenu lozinke morate uneti staru lozinku:</label>
            </br>
        <div>
            </br>
			<label>Stara lozinka</label>
            <input type="password"  name="lozinka_stara" placeholder="stara lozinka">
        </div>
        <div  >
            </br>
			<label>Nova lozinka</label>
            <input type="password"  name="lozinka1" placeholder="nova lozinka">
        </div>
		<div  >
            </br>
			<label>Ponovite novu lozinku</label>
            <input type="password"  name="lozinka2" placeholder="nova lozinka">
        </div>
    </div>
    <div>
        <div  >
            </br>
			<label>Adresa</label>
            <input type="text"  name="adresa" value="<?php echo $adresa; ?>" >
        </div>
        <div>
      </br>
			<label>JMBG</label>
      <input type="text" name="JMBG" value="<?php echo $jmbg; ?>">
    </div>
    <div >
      </br>
			<label>Broj telefona</label>
      <input type="text" name="telefon" value="<?php echo $telefon; ?>">
    </div>
	
		<div>
		<!--Tabela u kojoj je prikazana slika i data mogućnost izbora nove slike-->
		<table>
  <td>
     <!-- Skriveno polje koje nosi informaciju o lokaciji slike  -->
    <input name="thefile_name" value="<?php echo $thefile_name; ?>" type="hidden" >

    <img src="<?php echo $thefile_name; ?>"  width="60" height="60">
  </td>
   <td>  
  	 </br>
			<label>Odaberite novu sliku</label>
			
			
      <input type="file" name="slika" placeholder="Ako zelite Vas unesite novu sliku..." >
    
	</td>
	</table>
  </div>
  <small>Polja koja su označena sa * su ne mogu promeniti</small>
  <br><br>
  <!--Ukoliko korisnik želi da odustane vraća se na početnu stranu-->
  <div class="text-center">
    <a href="index.php"> Odustani od izemene i vrati se na početnu stranu </a>
	<br><br>
    <button type="submit" >Izmeni podatke</button>
  </div>
</form>
</main>
<?php include "footer.php"; ?>