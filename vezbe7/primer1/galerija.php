<?php
require "webclass.php";

$stranica = new DrugaStranica("Galerija","o nama, nesto, bla","ovo je stranica o nama");
$stranica->gornji_deo();
?>
        <article>
          <h1>Contact us</h1>
          <p>eserunt accusantium at maiores bea!</p>
        </article>
<?php      
$stranica->donji_deo();
?>