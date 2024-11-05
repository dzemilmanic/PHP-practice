<!-- index.php -->
<!-- naredbom include ukljucuje se sadrzaj iz programa navigacija.php-->

<?php 
    session_start();
    if (isset($_SESSION["korisnik"])){
    include "navigacija1.php";
	echo "Otvorena sesija korisnika  ". $_SESSION["korisnik"];
	}
   else
    include "navigacija.php";


?>
<main>
    <div>
         <div >
                        <h1>Ulogujte se i popunite anketu.</h1>
                        <p><a href="login.php" >Ulogujte se</a></p>
         </div>
    </div>
    <div >

        <div class="row">
            <div >
                <h2>Server-Side script </h2>
                <p> Skup instrukcija koje interpretira server i na osnovu njih generiše HTML kod. </p>
				<p> Rezultujući HTML kod se šalje klijentu kao deo HTTP odgovora.</p>

            </div>
            <div >
                <h3>PHP</h3>
                <p> PHP- se ugrađuje u HTML kod i interpretira na strani servera od strane PHP interpretatora</p>
            </div>
            <div >
                <h3>ASP</h3>
                <p>ASP je Microsoft-ova tehnologija koja omogućava slanje dinamičkih sadržaja klijentu kao što su XHTML, ActiveX kontrole, klijentske skripte i Java apleti.</p>
               
				   
			</div>
			<div >
                <p>...</p>
			</div>
        </div>
    </div>
</main>
<!-- naredba require isto kao include ali u slučaju greške izbacuje poruku i prekida program  -->	
 <?php require "footer.php" ?>