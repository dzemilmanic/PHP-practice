<?php
require "webclass.php";

$stranica = new Stranica("O nama","o nama, nesto, bla","ovo je stranica o nama");

$stranica->gornji_deo();

?>
<article>
          <h1>O nama</h1>
          <p>London is the capital city of England. It is the most populous city in the  United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>
          <p>Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.</p>
        </article>
  <?php      
$stranica->donji_deo();

?>