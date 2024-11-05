<!-- navigacija.php -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="autor" content="Ulfeta Marovac">
    <meta name="description" content="Superglobana promenljiva $_SERVER">
    <meta name="keywords" content="PHP, SERVER">
    <title>Primer 7: $_SERVER</title>
<style>
body {
  margin: 0px;
  font-family: Arial, Helvetica, sans-serif;
}
main {
  margin: 30px;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<?php
// Preuzimamo informacije o fajlu iz koga je pokrenuta navigacija
$putanja = $_SERVER["SCRIPT_NAME"];
// Poslednja pozicija znaka '/'
$pozicija=strrpos($_SERVER["SCRIPT_NAME"], "/");
$naziv_fajla=substr($_SERVER["SCRIPT_NAME"], $pozicija + 1);
?>
<div class="topnav">
<!-- postavlja element navigacije stranice koja je trenutno ucitana kao aktivan-->
  <a class=" <?php if ($naziv_fajla === "index.php") echo 'active'; ?>"  href="index.php"> Početna</a>
  <a class=" <?php if ($naziv_fajla === "anketa.php") echo 'active'; ?>" href="anketa.php"> Anketa</a>
  <a class=" <?php if ($naziv_fajla === "rezultati.php") echo 'active'; ?>" href="rezultati.php">Rezultati ankete</a>
  <a class=" <?php if (($naziv_fajla === "login.php")||($naziv_fajla === "registracija.php")) echo 'active'; ?>" href="login.php"> Prijavi se  </a>
</div>


