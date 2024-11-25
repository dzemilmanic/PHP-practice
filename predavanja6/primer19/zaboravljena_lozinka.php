<?php include "navigacija.php" ?>

<main>
<form action="mejl_zaboravljena_lozinka.php" method="post" >
    
    <div>
        <div>
		    </br>
            <label> Unesite e-mail za resetovanje poruke</label>
            <input type="email"  name="email" placeholder="Email" required>
        </div>
        
    </div>
    
  <div class="text-center">
    <button type="submit" >Resetuj lozinku</button>
  </div>
</form>
</main>
<?php include "footer.php"; ?>
