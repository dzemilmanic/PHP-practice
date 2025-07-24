<?php
session_start();
if(!isset($_SESSION['brojac']))
    $_SESSION['brojac'] = -1;
$_SESSION['brojac']++;
echo "Broj poseta: " . $_SESSION['brojac'];
?>