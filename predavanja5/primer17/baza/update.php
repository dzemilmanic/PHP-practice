<!DOCTYPE html>

<?php

	$odgovor = "";	

	if(isset($_GET['pretraga']))
	{
		include('db.php');

		$connection = connect();

		if(!isset($_GET['id_proizvoda']) || !isset($_GET['nova_cena']) || !isset($_GET['novi_naziv']))
			die("Neispravni podaci");

		$id = intval(mysqli_real_escape_string($connection, $_GET['id_proizvoda']));

		if(is_nan($id))
			$odgovor = "NEISPRAVNI PODACI";
		else
		{

		echo $id;
		$nova_cena = $_GET['nova_cena'];
		$novi_naziv = $_GET['novi_naziv'];
		$upit = "UPDATE proizvodi SET cena = $nova_cena, naziv = '$novi_naziv' where id = $id";
		echo $upit;

		if(mysqli_query($connection, $upit) === FALSE)
			$odgovor = "Neuspelo azuriranje";
		else
			$odgovor = "Uspesno azuriranje";
		
		}
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
		<input type="text" id="id" name="id_proizvoda">
		<br>
		<br>
		<label for="cena">Nova cena</label>
		<input type="number" id="cena" name="nova_cena">
		<br>
		<br>
		<label for="naziv">Novi naziv</label>
		<input type="text" id="naziv" name="novi_naziv">
		<br>
		<br>
		<input type="submit" value="Izmeni" name="pretraga">
	</form>
	<br>
	<?php echo $odgovor ?>

</body>
</html>