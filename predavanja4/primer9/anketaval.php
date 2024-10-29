<?php include "navigacija.php" ?>
<main>
   <?php
   // promenljive u kojima cemo cuvati prosledjene vrednosti
   $p1 = $p2 = $p3 = "";
   $p4[] = "";
   $komentar = "";
   //funkicija za proveru validnosti komentara da li je ispisan samo velikim odnosno malim slovima
   function proveri_validnost($k)
   {
      /* Za proveru validnosti koristicemo 
      \p{xx}-izdvaja karaktere sa svojstvom xx
      \P{xx}-izdvaja karaktere koji nemamju svojstvo xx
       L- oznaka za slovne karakte
      /u- upozorenje za nevalidne UTF-8 karaktere
           preg_replace- vrši zamenu svakog karaktera koji odgovara uzorku sa navedenim 
           karakterom u našem slučaju praznim
      */
      $komentar_samo_slova = preg_replace('/\PL/u', '', $k);
      /*
        Proveru da li je poruka ispisana samo velikim ili malim slovima vršimo 
        pomoću funkcija za proveru tipa karaktera
        ctype_upper- provera da li su karakteri veliki
        ctype_lower- provera da li su karakteri mali 	
        */
      if (ctype_upper($komentar_samo_slova) || ctype_lower($komentar_samo_slova)) {
         return 0;

      } else {

         return 1;
      }
   }
   //Postavljamo promenljivu o validno popunjenjenoj anketi na tacno
   $validno_popunjeno = true;
   if (isset($_POST['posalji_anketu'])) {
      $p1 = $_POST["pitanje1"];
      $p2 = $_POST["pitanje2"];
      $p3 = $_POST["pitanje3"];
      $p4 = implode(",", $_POST["pitanje4"]);
      $komentar = $_POST["komentar"];
      $p4_length = count($_POST["pitanje4"]);


      /**Proveravamo da li je komentar validan
       **/
      if (!empty($p1) && !empty($p2) && !empty($p3) && !empty($p4) && !empty($komentar)) {
         $validno_popunjeno = proveri_validnost(k: $komentar);

         /**Proveravamo da li je korisnik  na četvrto pitanje
            štiklirao poslednju opciju "Nijedan od navedenih"
            i još neki programski jezik
         **/
         if ($p4_length > 1 and in_array("x", $_POST["pitanje4"]))
            $validno_popunjeno = false;
         /**Proveravamo da li je korisnik odgovorio da zna slolidno programiranje ocene 3 i vise 
         a pri tom ne zna makar dva navedena jezika i nije za racunarom makar  2-4h sata dnevno
         **/
         if (intval($p3) - intval(value: $p2) > 2 or (in_array("x", $_POST["pitanje4"]) and intval($p3) > 1) or intval($p3) - 2 > $p4_length) {
            $validno_popunjeno = false;
         }
         ;
         /**Ispisujemo poruku da li je uspesno popunjena anketa
          **/
         if ($validno_popunjeno)
            echo "<h4>Uspešno ste popunili anketu</h4>";
         else
            echo "<h4>Anketa nije uspešno popunjena</h4>";
      }
   }
   ?>
</main>
<?php include "footer.php" ?>