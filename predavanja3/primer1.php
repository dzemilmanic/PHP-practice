<!DOCTYPE html>
<html>

<body>
    <?php
    /*
  * Ovo je jedan komentar u vise linija unutar php programa
  * Promenljive u php započinju znakom $ i mogu biti:
  * lokalne, globalne i statičke
  * Superglobalna promenljive:
  * $GLOBALS - služi za pristup globalnim varijablama
  */
    #Globalna promenljiva x 
    $x = 1;
    $a = 'A';
    // Ispis iz php programa 
    echo "<p>Vrednost promenljive globane promenljive x: $x</p>";
    // Promenljiva x nije vidljiva unutar funkcije
    function moja_funkcija()
    {
        //Globalnoj promenljivoj mozemo pristupiti i pomocu global
        global $a;
        //Staticke promenljive pripadaju funkcijama 
        //i ne brisu se posle njihovog izvrsavanja
        static $z = 0;
        // Ovaj deo koda ce se izvrsiti samo u prvom pozivu f-je 
        // u svakom sledecem pozivu ce z ce imati vecu vrednost
        if ($z == 0) {
            echo "<p>Vrednost promenljive x unutar funkcije: $x</p>";
            echo "<p>Vrednost promenljive a unutar funkcije: $a</p>";
            // Ako definisemo novu promenljivu ona je lokalnog karaktera
            $x = "Lokalna promenljiva x";
            echo "<p>Vrednost promenljive x definisane unutar funkcije:<b> $x</b></p>";
            //Globalnoj promenljivoj pristupimo preko $GLOBALS 
            echo "<p>Vrednost globalne promenljive x prikazane pomoću \$GLOBALS:";
            echo $GLOBALS['x'];
            echo "</p>";
            //Unutar funkcije definisemo globalnu promenljivu
            $GLOBALS['y'] = 2;
        }
        $z++;
        echo  "<p>Vrednost statičke promenljive <b> $z </b> </p>";
    }
    //Poziv f-je
    echo "<p>Prvi poziv funkcije:</p>";
    moja_funkcija();
    echo "<p>Drugi poziv funkcije:</p>";
    moja_funkcija();
    echo "<p>Vrednost globalne promenljive  promenljive y: $y</p>";
    ?>
</body>

</html>