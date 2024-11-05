<?php include "navigacija.php" ?>
<?php include "registracijaval1.php" ?>
<main>
<?php
// stanje da li su podaci prosleđeni
$poslato = false;

	if(isset($_GET['korisnickoIme'])&& isset($_GET['lozinka']))
	{
       $poslato = true;
	   $korisnik=$_GET['korisnickoIme'];
	}
?>
<div>
    <h1>Prijava</h1><br>
    <!-- method="GET" govori browser-u da vrednosti koje korisnik upiše u formular doda URL adresi
	 -- pritiskom na submit dugme poziva se program zadat kao action sa prosleđenim argumentima 
	 -- tako na primer ako u polje korisničko ime upišete Paja
	 -- a u polje lozinka Pata nakon submita dobijate	
	 -- login.php?korisnickoIme=Paja&lozinka=Pata-->	
	   
		 
    <form action="login.php" method="GET" onsubmit="return provera()">
        <div >
            <label>Korisničko ime</label>
            <input type="text" class="form-control" name="korisnickoIme"  id="username" autofocus>
        </div>
        <div >
            <label>Lozinka</label>
            <input type="password" class="form-control" name="lozinka" id="password" >
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