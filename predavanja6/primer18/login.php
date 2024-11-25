<?php include "navigacija.php" ?>
<?php include "registracijaval1.php" ?>
<?php include_once "baza/db.php"; ?>
<?php
// stanje da li su podaci prosleđeni
$poslato = false;

	 //Provera da li su podaci o korisniku prosleđeni POST metodom
	if(isset($_POST['korisnickoIme'])&& isset($_POST['lozinka']))
	{
       $poslato = true;
	   $korisnik=$_POST['korisnickoIme'];
	   $lozinka=$_POST['lozinka'];
	   
	   /* Poziv funkcija skripte db.php
	    * $broj predstavlja broj korisnika u tabeli korisnik sa 
		* odgovarajućim korisničkim imenom i lozinkom 
		*/
	   $anketa=veza();
	   $broj=broj_korisnika($anketa,$korisnik,$lozinka);
	   raskid_veze($anketa);
		
		/* Ako je broj korisnika u tabeli korisnik 
         * različit od 1 onda je greška 		 
		 */
		if($broj <> 1){
		 $poslato = false;
		 echo "Neispravno korisničko ime ili lozinka!!!";
			
		}
    else
	{
			  
      /* Provera da li je zahtevano čuvanje podataka
	   * ukoliko se korisnik izjasnio da želi da čuva podatke
	   * funkcijom setcookie šalju se kolačići pretraživaču
	   * putem HTTP odgovora */
      if(!empty($_POST["remember"])) {
	  
	  if($_POST["remember"]=="DA"){
		
        /* parametri funkcije setcookie
         * ime kolačića indeks u nizu $_COOKIE
		 * vrednosti
		 * dužina trajanja izražena u sekundama
         **/		 
	    setcookie ("username",$_POST["korisnickoIme"],time()+ 3600);
	    setcookie ("password",$_POST["lozinka"],time()+ 3600);
	    echo "   Kolačići su uspešno postavljeni";
     } 
	 else {
		 
        /* Za brisanje kolačića postavlja se
		 * dužina trajanja na negativnu vrednosti
		 * pa kako je isteklo vreme trajanja kolačić se briše
         **/	
		setcookie("username","", time() - 3600);
		setcookie("password","", time() - 3600);	
		echo "   Kolačići su uspešno izbrisani";
    }
	}
     /* Svaka skripta koja radi sa sesijama mora da pozove funkciju session_start()
	  * $_SESSION sadrži promenljive koje se čuvaju tokom jedne sesije dok je ona aktivna
	  * Otvaramo sesiju i postavljamo vrednost promenljive $_SESSION["korisnik"] na trenutno aktivnog korisnika.*/
	if (!isset($_SESSION)){
            session_start();
        $_SESSION["korisnik"] = $korisnik;
		 
		 
		//Otvaramo skript index.php koja će navigaciju prilagoditi 
        header("Location:index.php");
	   }
	 }
	}
?>

<main>
<div>
    <h1>Prijava</h1><br>
    	
	<?php 
	 
	 /* Provera se trenutno  stanje sa kolčićima */	
	 if( isset($_COOKIE["username"]) && isset($_COOKIE["password"]))
		 echo "<p >Kolačići su postavljeni </p>";
	 else
		 echo "<p >Kolačići nisu postavljeni </p>";
	?>
</form>
		 
    <form action="login.php" method="POST" onsubmit="return provera()">
        <div >
		
		    <!-- Ukoliko su kolačići postavljeni vrednost polja: 
             -- korisničkoIme dobija vrednost kolačića $_COOKIE["username"]
			 -- lozinka dobija vrednost kolačića $_COOKIE["password"]
		     -->
            <label>Korisničko ime</label>
            <input type="text" class="form-control" name="korisnickoIme" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" id="username" autofocus>
        </div>
        <div >
            <label>Lozinka</label>
            <input type="password" class="form-control" name="lozinka" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" id="password" >
        </div>
		 <div>
		     
			  <!-- Promenljiva remember označava da li korisnik želi da čuva podatke. -->
		     <label> Da li želite da čuvate podatke o logovanju </label>			 	 
			 <select name="remember" id="zapamti">
             <option value="NE"> NE </option>
             <option selected value="DA"> DA </option>
             </select>
		</div>	 
		 
        <?php
        if ($poslato)
            echo "<p class='text-danger'>Trenutno je poslat zahtev za logovanje korisnika <b>$korisnik</b> </p>";
		else
			
		    echo "<p class='text-danger'>Trenutno nema poslatih zahteva za logovanje </p>";
        ?>
        <a href="$">Zaboravio sam lozinku</a><br><br>
        <button type="submit" >Prijavi se</button>
    </form>
	
	<!-- Za validaciju polja koristi se JS 
	  -- funkcija proverava da li su polja username i password popunjena
	  -- i daje obaveštenje o nepopunjenom polju
	  -->
	<script>
		function provera()
		{
			var username = document.getElementById('username').value.trim();
			var password = document.getElementById('password').value.trim();

			if(username.length == 0)
			{
				alert("Nije uneto korisničko ime!");
				return false;
			}

			if(password.length == 0)
			{
				alert("Nije uneta lozinka!");
				return false;
			}

			return true;
		}
	</script>
	
    <br>Nemate nalog? <a href="registracija.php">Registrujte se</a><br>
</div>
</main>
<?php include "footer.php" ?>