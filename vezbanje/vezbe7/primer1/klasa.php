<?php
class Klasa{
    public $naslov;
    public $kljucne_reci;
    public $opis;
    function __construct($naslov, $kljucne_reci, $opis){
        $this->naslov = $naslov;
        $this->kljucne_reci = $kljucne_reci;
        $this->opis = $opis;
    }   
    
    function ispisi_gornji_deo(){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <?php $this->ispisi_head(); ?>
        <body>
        <header>
            <h1><?php echo $this->naslov; ?></h1>
        </header>
        <?php
    }
    function ispisi_donji_deo(){
        ?>
        <footer>
            <p>Footer content</p>
        </footer>
        </body>
        </html>
        <?php
    }
    function ispisi_navigaciju(){
        ?>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <?php
    }
    function ispisi_sadrzaj(){
        ?>
        <main>
            <p>This is the main content area.</p>
        </main>
        <?php
    }
    function ispisi_stranicu(){
        $this->ispisi_gornji_deo();
        $this->ispisi_navigaciju();
        $this->ispisi_sadrzaj();
        $this->ispisi_donji_deo();
    }
    function stilovi(){
        ?>
        <link rel="stylesheet" href="style.css">
        <?php
    }
    function ispisi_head(){
        ?>
        <head>
            <title><?php echo $this->naslov; ?></title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="keywords" content="<?php echo $this->kljucne_reci; ?>">
            <meta name="description" content="<?php echo $this->opis; ?>">
            <?php $this->stilovi(); ?>
        </head>
        <?php
    }
}
?>
