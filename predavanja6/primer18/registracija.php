<?php include "navigacija.php" ?>
<!--?php include "registracijaval1.php" ?-->
<!--enctype="multipart/form-data" omogućava upload fajlova na server-->
<main>
<form action="login.php" method="post"  enctype="multipart/form-data">
    <div>
        <div>
		    </br></br>
            <label>Ime*</label>
            <input type="text"  name="ime" placeholder="Ime" required>
        </div>
        <div>
		    </br>
            <label>Prezime*</label>
            <input type="text"  name="prezime" placeholder="Prezime" required>
        </div>
    </div>
    <div>
        <div>
		    </br>
            <label>Email*</label>
            <input type="email"  name="email" placeholder="Email" required>
        </div>
        <div>
            </br>
			<label>Korisničko ime*</label>
            <input type="text"  name="korisnicko_ime" placeholder="Korisnicko ime" required>
        </div>
    </div>
    <div>
        <div>
            </br>
			<label>Lozinka*</label>
            <input type="password"  name="lozinka1" placeholder="Lozinka" required>
        </div>
        <div  >
            </br>
			<label>Ponovite lozinku*</label>
            <input type="password"  name="lozinka2" placeholder="Lozinka" required>
        </div>
    </div>
    <div>
        <div  >
            </br>
			<label>Adresa</label>
            <input type="text"  name="adresa" placeholder="Adresa">
        </div>
        <div>
      </br>
			<label>JMBG</label>
      <input type="text" name="JMBG" placeholder="JMBG">
    </div>
    <div >
      </br>
			<label>Broj telefona</label>
      <input type="text" name="telefon" placeholder="Broj telefona">
    </div>
		<div>
      </br>
			<label>Slika</label>
			<!--input element koji ispisuje klasičnu "Browse" strukturu za unos slike-->
      <input type="file" name="slika" placeholder="Molim Vas unesite sliku..." pattern="([^\s]+(\.(?i)(jpg|png|gif|bmp))$)">
    </div>
  </div>
  <small>Polja koja su oznacena sa * su obavezna</small>
  <br><br>
  <div class="text-center">
    <button type="submit" >Registruj se</button>
  </div>
</form>
</main>
<?php include "footer.php"; ?>