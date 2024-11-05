<?php include "navigacija.php" ?>
<?php include "registracijaval.php" ?>

<form action="registracija.php" method="post" >
    <div  >
        <div  >
		    </br></br>
            <label>Ime*</label>
            <input type="text"  name="ime" placeholder="Ime" required>
        </div>
        <div  >
		    </br>
            <label>Prezime*</label>
            <input type="text"  name="prezime" placeholder="Prezime" required>
        </div>
    </div>
    <div  >
        <div  >
		    </br>
            <label>Email*</label>
            <input type="email"  name="email" placeholder="Email" required>
        </div>
        <div  >
            </br>
			<label>Korisnicko ime*</label>
            <input type="text"  name="korisnicko_ime" placeholder="Korisnicko ime" required>
        </div>
    </div>
    <div  >
        <div  >
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
    <div  >
        <div  >
            </br>
			<label>Adresa</label>
            <input type="text"  name="adresa" placeholder="Adresa">
        </div>
        <div class="form-group col-md-3">
            </br>
			<label>JMBG</label>
            <input type="text"  name="JMBG" placeholder="JMBG">
        </div>
        <div class="form-group col-md-3">
            </br>
			<label>Broj telefona</label>
            <input type="text" name="telefon" placeholder="Broj telefona">
        </div>
		<div class="form-group col-md-3">
            </br>
			<label>Broj telefona</label>
            <input type="file" name="slika" placeholder="Molim Vas unesite sliku..." pattern="([^\s]+(\.(?i)(jpg|png|gif|bmp))$)">
        </div>
		
    </div>
    <small>Polja koja su oznacena sa * su obavezna</small>
    <!--?php
        if ($greska != "")
            echo    '<div class="text-center">
                        <p class="text-center text-danger">' . $greska . '</p>
                    </div>';
    ?-->
    <br><br>
    <div class="text-center">
        <button type="submit" >Registruj se</button>
    </div>
</form>

<?php include "footer.php"; ?>