<?php
if(!isset($_SESSION['brojac']))
    $_SESSION['brojac'] = -1;
$_SESSION['brojac']++;
echo "<p>Vi ste posetilac broj" . $_SESSION['brojac'] . "</p>";
?>