<?php
class Stranica{

    private $naslov;
    private $kljucne_reci;
    private $opis;
    private $stil;
    function __construct($naslov,$kljucne_reci,$opis){
        $this->naslov=$naslov;
        $this->kljucne_reci = $kljucne_reci;
        $this->opis = $opis;
        
    }
    function stilovi(){
        ?>
        <link href='stranica.css'  rel="stylesheet"/>
        <?php
    }
    function prikazi_head(){
      ?>
              <head>
        <title><?php echo $this->naslov ?></title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta name="keywords" content='<?php echo $this->kljucne_reci;  ?>'>
        <meta name="description" content='<?php echo $this->opis;  ?>' >
        <?php $this->stilovi();  ?>
        </head>
        <?php
    }
    function gornji_deo(){
        ?>
        <!DOCTYPE html>
        <html lang='en'>
        <?php $this->prikazi_head(); ?>
        <body>
        <section>
          <?php
          $this->prikazi_header();
          $this->prikazi_navigaciju();
    }
    function donji_deo(){
        ?>
      </section>
      </body>
      </html>
      <?php
      $this->prikazi_footer();
    }
    function prikazi_header(){
      ?>
       <header>
          <h2><?php echo $this->naslov; ?></h2>
        </header>
        <?php
    }
    function prikazi_footer(){
      ?>
          <footer>
        <p>Footer</p>
      </footer>
      <?php
    }
    function prikazi_navigaciju(){
      ?>
        <nav>
            <ul>
              <li><a href='onama.php'>O nama</a></li>
              <li><a href='kontakt.php'>Konktakt</a></li>
              <li><a href='galerija.php'>Galerija</a> </li>
            </ul>
          </nav>
          <?php

    }
}
class DrugaStranica extends Stranica{
  function stilovi(){
    ?>
    <link href='drugastranica.css'  rel="stylesheet"/>
    <?php
}
  function prikazi_navigaciju(){
    ?>
     <nav style="background-color:red">
            <ul>
              <li><a href='onama.php'>O nama</a></li>
              <li><a href='kontakt.php'>Konktakt</a></li>
              <li><a href='galerija.php'>Galerija</a> </li>

            </ul>
    </nav>
    <?php
  }
}
?>