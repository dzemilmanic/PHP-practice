<?php
class Knjiga {
    private $naslov;
    private $ISBN;
    private $autor;
    function __construct($naslov, $ISBN, $autor) {
        $this->naslov = $naslov;
        $this->ISBN = $ISBN;
        $this->autor = $autor;
    }
    function getNaslov() {
        return $this->naslov;
    }
    function getISBN() {
        return $this->ISBN;
    }
    function getAutor() {
        return $this->autor;
    }
    

}
$knjiga1 = new Knjiga("knjiga1", "1234", "autor1");
$knjiga2 = new Knjiga("knjiga2", "12345", "autor2");
$knjiga3 = new Knjiga("knjiga3", "12346", "autor3");
$niz = [
    $knjiga1,
    $knjiga2, 
    $knjiga3
];
?>
<table border=1>
    <tr>
        <th>Naslov</th>
        <th>Autor</th>
        <th>ISBN</th>
    <tr>
    <?php
    foreach($niz as $knjiga) {
        echo "<tr>
                <td>{$knjiga->getNaslov()}</td>
                <td>{$knjiga->getAutor()}</td>
                <td>{$knjiga->getISBN()}</td>
              <tr>";
    }
    ?>
</table>