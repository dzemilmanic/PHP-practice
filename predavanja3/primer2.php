<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
	<meta name="autor" content="Ulfeta Marovac">
	<meta name="description" content="Nizovi u PHP-u">
	<meta name="keywords" content="PHP, ARRAY">
  	<title>Primer 10: PHP nizovi</title>
    <style>
	main{
	margin: 30px;
	font-size: 17px;
	}
	table{
	height:100%;
	width:100%;
	margin: 15px;
	}
	tr {
     border-bottom: 3px solid;
	  
    }
	th,td {
    vertical-align: top;
    text-align: left;
	width: 30% ;
    }
	th {
    height: 20% ;
    }
	</style>
</head>

<body>
<main>	
<?php
/* Prikaz rezultata funkcija za rad sa nizovima se štampa u 
 * HTML tabeli */
echo "<table><tr><th>";

//Prvi red tabele zaglavlja
echo '</br></br><b style="color: red;">Kreiranje niza i funkcija count </b></br></br>';
echo "</th><th>";
echo '</br></br><b style="color: red;"> Petlja za rad sa kolekcijama-foreach</b></br></br>';
echo "</th><th>";
echo '</br></br><b style="color: red;"> Funkcije explode i each</b></br></br>';
echo "</th></tr>";


//Drugi red rezultati odgovarajućih funkcija navedenih u zaglavlju
echo "<tr><td>";

/* Kreiranje niza programskih jezika
 * count - daje broj elemenata niza 
 * štampaju se svi elementi niza
 */
$p_jezici=array("C","C#","C++","Java","PHP","JavaScript");
$count=count($p_jezici);
echo "<i>Broj elemenata u nizu \$p_jezici je $count </i></br></br>";
for($i=0;$i<$count;$i++){
	echo "p_jezici[$i]=$p_jezici[$i]</br>";	
}
echo "</td><td>";

//petlja foreach
foreach($p_jezici as $jezik){
	echo "$jezik<br/>";	
}
echo "</td><td>";

/* Funkcijom explode rastavljamo string na elemente niza pomoću zadatog operatora
 * each()iz niza $p_jezici izdvaja tekući element i interni pokazivač pomera na naredni element*/
$jezici="C,C#,C++,Java,PHP,JavaScript";
$p_jezici=explode(",",$jezici);
echo "<i>Funkcijom explode od stringa </br>'C,C#,C++,Java,PHP,JavaScript' </br> dobijen je niz elemenata: </i></br>";
while($jezik=each($p_jezici)){
   echo $jezik['key'];
   echo "->";
   echo $jezik['value'];	
   echo "<br/>";
}
echo "</br></td></tr>";

//Dugi red zaglavlja 
echo "<tr><th>";
echo '<b style="color: red;"> Funkcije reset,list</b>';
echo "</th><th>";
echo '<b style="color: red;"> Da li se u nizu nalazi "C"? </br> funkcija in_array </b>';
echo "</th><th>";
echo '<b style="color: red;"> Niz svih indeksa elemenata array_keys,array_search </b>';
echo "</br></th></tr><tr><td>";
 
//Rezultati funkcija navedeni u drugom redu zaglavlja
  
/* Postavlja se pokazivač na početak niza-reset
 * koristimo list za smeštanje elemenata niza u listu elemenata $r_br, $jezik
 * prikazuju se svi elementi redom
 * na kraju vraća se pokazivač na početak niza-reset
 */
reset($p_jezici);
while(list($r_br, $jezik) = each($p_jezici)){
   echo "p_jezici[$r_br]=$jezik<br/>";	
  }
reset($p_jezici);
echo "</td><td>";
 

/* Funkcijom explode rastavljamo string na elemente niza pomoću zadatog operatora
 * niz je kolekcija elemenata koji sadrže elemente key i value
 * prikazuju se elementi niza 
 * in_array daje TRUE ako je vrednost datog elementa u datom nizu i FALSE u obrnutom slučaju
 * proverava se da li se string "C" nalazi u nizu*/
echo "<i>Niz sadrži u vrednosti koje se pojavljuju više puta </i></br>";
$jezici="C,C,C#,C++,Java,C#,PHP,PHP,C,JavaScript";
$p_jezici_x=explode(",",$jezici);
while($jezik=each($p_jezici_x)){
   echo $jezik['key'];
   echo "->";
   echo $jezik['value'];	
   echo "<br/>";
}
if (in_array("C",$p_jezici_x))
 echo "<i>String 'C' se nalazi u nizu \$p_jezici</i>" ;
else
	echo "<i></br>String 'C' se ne nalazi u nizu \$p_jezici</i>" ;
echo "</td><td>";

/* array_keys – daje niz svih indeksa elemenata, odnosno niz indeksa zadate vrednosti
 * array_search(element,imeNiza) – daje vrednost prvog indeksa zadate vrednosti
 */
echo '<i>Array_keys za element "C" </i></b></br>';
$keys=array_keys ($p_jezici_x,"C");
 while($k=each($keys)){
   echo $k['key'];
   echo "->";
   echo $k['value'];	
   echo "</br>";
}
echo '<i>Vrednost prvog indeksa element "C"</i> </br>';
echo array_search("C",$p_jezici_x) ;
echo "</td></tr></table>";

?>
</main>
</body>
