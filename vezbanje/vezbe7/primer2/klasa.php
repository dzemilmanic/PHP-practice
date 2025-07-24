<?php
class Klasa {
    public $naslov;
    public $autor;
    public $isbn;
    function __construct($naslov, $autor, $isbn) {
        $this->naslov = $naslov;
        $this->autor = $autor;
        $this->isbn = $isbn;
    }
}
$knjiga1 = new Klasa("Knjiga 1", "Autor 1", "1234567890");
$knjiga2 = new Klasa("Knjiga 2", "Autor 2", "0987654321");
$knjiga3 = new Klasa("Knjiga 3", "Autor 3", "1122334455"); 
$niz = [
    $knjiga1,
    $knjiga2, 
    $knjiga3
];
?>
<table border="1">
    <tr>
        <th>Naslov</th>
        <th>Autor</th>
        <th>ISBN</th>
    </tr>
    <?php
        foreach($niz as $knjiga){
            echo "<tr>
                    <td>{$knjiga->naslov}</td>
                    <td>{$knjiga->autor}</td>
                    <td>{$knjiga->isbn}</td>
                  </tr>";
        }
    ?>
</table>