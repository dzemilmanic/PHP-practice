<!DOCTYPE html>

<?php

	$odgovor = FALSE;	

	if(isset($_GET['pretraga']))
	{
		include('db.php');

		$odgovor = TRUE;

		$connection = connect();

		if(!isset($_GET['id_proizvoda']))
			die("Nije naveden ID");

		$upit = "SELECT naziv, cena FROM proizvodi WHERE id = ".$_GET['id_proizvoda'];
		//echo $upit;

		$rezultat = mysqli_query($connection, $upit);

		if($rezultat === FALSE)
			die("Greska u upitu!");

		if(mysqli_num_rows($rezultat) == 0)
			$odgovor = FALSE;
	}

?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pretraga</title>
</head>
<body>
	<form action="" method="get">
		<label for="id">ID proizvoda</label>
		<input type="number" id="id" name="id_proizvoda">
		<input type="submit" value="Trazi" name="pretraga">
	</form>
<br><br>
	<?php if($odgovor == TRUE && isset($_GET['pretraga'])){
		echo "<table border='1'><tr><th>Naziv</th><th>Cena</th></tr>";
			while($red = mysqli_fetch_assoc($rezultat))
			{
				echo "<tr><td>".$red['naziv']."</td><td>".$red['cena']."</td></tr>";
			}
			echo "</table>";
		}else if(isset($_GET['pretraga']))
			echo "Proizvod nije pronadjen!";

			disconnect($connection);  ?>
</body>
</html>