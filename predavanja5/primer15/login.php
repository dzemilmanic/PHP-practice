<?php include "navigacija.php" ?>
<?php include "registracijaval1.php" ?>
<?php
// stanje da li su podaci prosleđeni
$poslato = false;
     
	 //Provera da li su podaci o korisniku prosleđeni POST metodom
	if(isset($_POST['korisnickoIme'])&& isset($_POST['lozinka']))
	{
       $poslato = true;
	   $korisnik=$_POST['korisnickoIme'];
	
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