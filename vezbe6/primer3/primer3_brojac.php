<?php
if(!isset($_COOKIE['brojac'])){
    setcookie("brojac", -1, time()+3600);
    return;
};
setcookie("brojac", ++$_COOKIE['brojac']);
echo "<p>Vi ste posetilac broj" . $_COOKIE['brojac'] . "</p>";
?>