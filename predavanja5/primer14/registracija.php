<?php include "navigacija.php" ?>
<main>

<!--Forma za unos podataka o novom korisniku
   --enctype="multipart/form-data" omogućava upload fajlova na server
   -- opcija required u input poljima označava da se ova polja moraju popuniti
   -->
<form action="login.php" method="post"  enctype="multipart/form-data">
  <div>
    </br>
    <label>Ime*</label>
    <input type="text"  name="ime" placeholder="Ime" required>
  </div>
  <div>
    </br>
    <label>Prezime*</label>
    <input type="text"  name="prezime" placeholder="Prezime" required>
  </div>
  <div>
    </br>
    <label>Email*</label>
    <input type="email"  name="email" placeholder="Email" required>
  </div>
  <div>
    </br>
    <label>Korisničko ime*</label>
    <input type="text"  name="korisnicko_ime" placeholder="Korisničko ime" required>
  </div>
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
  <div>
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
    <label>Slika*</label>
    <!--input element koji ispisuje klasičnu "Browse" strukturu za unos slike
        -- obrada validnosti unosa slike se vrši na serverskoj strani  -->
    <input type="file" name="slika" placeholder="Molim Vas unesite sliku..." >
  </div>
  </div>
    <small>Polja koja su označena sa * su obavezna</small>
    <br><br>
    <button type="submit" >Registruj se</button>
  </div>
</form>
</main>
<?php include "footer.php"; ?>
