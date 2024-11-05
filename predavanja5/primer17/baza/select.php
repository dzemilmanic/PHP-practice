<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Proizvodi</title>
</head>
<body>
	
	<?php

		include('db.php');

		$connection = connect();

		$upit = "SELECT * FROM proizvodi";

		$rezultat = mysqli_query($connection, $upit);

		if($rezultat === FALSE)
			die("Greska u upitu!");

		while($red = mysqli_fetch_assoc($rezultat))
		{
			echo $red['naziv'].", ".$red['cena']." RSD<br>";
		}

		disconnect($connection);

	?>

</body>
</html>