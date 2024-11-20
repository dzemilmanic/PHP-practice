<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <form action="primer1.php" method="get">
      <p>
        <label for="dan">Dan</label>
        <input type="number" min="1" max="31" id="dan"name="dan" value ="<?php echo isset($_GET["dan"])?>" />
      </p>
      <br/>
      <p>
        <label for="mesec">Mesec</label>
        <input type="number" min="1" max="12" id="mesec" name="mesec" value ="<?php echo isset($_GET["mesec"])?>" />
      </p>
      <br/>
      <p>
        <label for="godina">Godina</label>
        <input type="number" min="1900" max="2024" id="godina" name="godina" value ="<?php echo isset($_GET['godina'])?>"/>
      </p>
      <br/>
      <input type="submit" />
    </form>
  </body>
</html>
<?php
$trenutni_datum = time();
$datum_rodjenja = mktime(0,0,0,($_GET['dan']), ($_GET['mesec']), ($_GET['godina']));
$broj_dana_od_rodjenja = ($trenutni_datum - $datum_rodjenja) / (60*60*24);
echo "Od vaseg rodjenja proslo je ". $broj_dana_od_rodjenja. " dana";
?>