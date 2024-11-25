<?php 
    include_once "baza/db.php"; 
    include_once "baza/maildb.php";

    if(!isset($_GET['kod'])){
        exit("Nije pronađen kod za potvrdu.");
    }
	
    if(!isset($_GET['email'])){
        exit("Nije pronađen mejl za potvrdu.");
    }
    $email=$_GET["email"];
	$kod=$_GET["kod"];
?>

<main>
<!-- Forma za unos nove lozinke
  -->
<form action="reset.php" method="post"  enctype="multipart/form-data">
    
    <div>
    </br>
	<label>Za promenu lozinke morate uneti novu lozinku:</label>
            </br>
          <!-- Skriveno polje koje nosi informaciju o mejlu korisnika i kodu  -->
			<input name="email" value="<?php echo $email; ?>" type="hidden" >
			<!-- Skriveno polje koje nosi informaciju o mejlu korisnika  -->
			<input name="kod" value="<?php echo $kod; ?>" type="hidden" >
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
    
  <!--Ukoliko korisnik želi da odustane vraća se na početnu stranu-->
  <div class="text-center">
    <a href="index.php"> Odustani od izemene i vrati se na početnu stranu </a>
	<br><br>
    <button type="submit" >Promeni lozinku</button>
  </div>
</form>
</main>
<?php include "footer.php"; ?>