<?php include "navigacija.php" ?>
<main>
<div align=center>
    <h1>Anketa</h1>
</div>
    <!-- forma sa pitanjima za anketiranje
   validacija forme bice izvrsena delimično uz pomoc JS fukcije validacija()
		 a provera da li je korisnik ispravno popunio anketu ili ima nelogičnosti
		 vrsi se na serverskoj strani pri cemu je forma prosledjena POST metodom
    	-->
 <form action="anketaval.php" method="POST" name="anketa" id="anketa" onsubmit="return validacija()">
   <!-- prvo pitanje -->
 <div>
	 <h3><b>1.Da li volite programiranje?</b></h3>
     <input   type="radio" name="pitanje1" value="Da" > Da<br>
     <input   type="radio" name="pitanje1" value="Ne" > Ne<br>
     <i style="color:Tomato;" id="p1Err" ><b></b></i>
 </div>
 <hr> 
   <!-- drugo pitanje -->
 <div>
 <h3><b>2. Koliko vremena provodite za računarom?</b></h3>
 <select   name="pitanje2" id="lista"  >
     <option disabled selected value>-Odaberite jedan odgovor-</option>
     <option value="1">Manje od dva sata nedeljeno</option>
     <option value="2">Manje od dva sata dnevno </option>
     <option value="3">Od dva do četiri sata dnevno</option>
     <option value="4">Od četiri do osam sati dnevno</option>
     <option value="5">Preko osam sati dnevno</option>
 </select><br>
 <i style="color:Tomato;"  id="p2Err"></i>
</div>
<hr>
   <!-- trece pitanje -->
<div >
<h3><b>3.Ocenite vaše programersko iskustvo?</b></h3>
<select   name="pitanje3" >
    <option disabled selected value>-Odaberite jedan odgovor-</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
 </select><br>
 <i style="color:Tomato;"  id="p3Err"></i>
 </div>
 <hr  >
    <!-- cetvrto pitanje -->
 <div  >
 <h3><b>4.Koje programske jezike koristite?</b></h3>
     <p ><small>(moguće je više odgovora)</small></p>
     <input type="checkbox" name="pitanje4[]" value="Py" > Python
     <input type="checkbox" name="pitanje4[]" value="JS" > JavaScript
     <input type="checkbox" name="pitanje4[]" value="PHP" > PHP
     <input type="checkbox" name="pitanje4[]" value="C" > C
     <input type="checkbox" name="pitanje4[]" value="Java" > Java
     <input type="checkbox" name="pitanje4[]" value="C++" > C++
     <input type="checkbox" name="pitanje4[]" value="C#" > C# 
     <input type="checkbox" name="pitanje4[]" value="x" > Nijedan od navedenih
     <br>
 </div>
 <i style="color:Tomato;" id="p4Err"></i>
 <hr>
   <!-- komentar -->
 <div  >
 <h3><b>Komentar</b></h3>
     <textarea name="komentar" rows="3" cols="50" placeholder="Opišite Vaše programersko interesovanje."></textarea>
     <p><small> Komentari koji su upisani samo velikim ili samo malim slovima  biće označeni kao nevalidni </small></p>
 </div>
 <i  style="color:Tomato;" id="komErr"></i>
 <hr>
   <!-- dugme potvrdi -->
 <div >
 <button type="submit" name="posalji_anketu" value="Submit">Pošalji </button>
 </div>
 </form>
   
 <script>
 
//Funkcija  za štampanje greške ispod odgovarajućeg polja za unos u formi 
function stampajGresku(elemId, hintMsg) 
{ /* U element dokumenta sa odgovarajaućim id-jem biće ubacena poruka*/
  document.getElementById(elemId).innerHTML = hintMsg;
 }

//Funkcija  za proverava da li su uneti svi odgovori

function validacija(){

    //preuzimaju se vrednosti iz elemenata forme za svako  pitanje
    var p1=document.anketa.pitanje1.value;
    var p2=document.anketa.pitanje2.value;
    var p3=document.anketa.pitanje3.value;
    var kom=document.anketa.komentar.value;
    //postavlja se greska za svako pitanje na netacno
    var p1Err=p2Err=p3Err=p4Err=komErr=false;
    //ako je nije izabran odgovor oznaci kao greska i stampaj upozorenje
    if(p1==""){
    stampajGresku("p1Err","Odaberite jedan odgovor!");
    p1Err=true;
    }
    if(p2==""){
     stampajGresku("p2Err","Odaberite jedan odgovor!");
     p2Err=true;
    }
    if(p3==""){
     stampajGresku("p3Err","Odaberite jedan odgovor!");
     p3Err=true;
    }
	// pitanje 4  cuva odgovore kao niz pa proveravamo da li su oznaceni
    var count=0;
    var nBox = document.getElementsByName('pitanje4[]');
	for (i=0; i<nBox.length; i++)
		{
		 if (nBox[i].checked == true){
			  count++;
			  break;
			  }
		}
	if (count == 0)
	{stampajGresku("p4Err","Morate odabrati makar jedan odgovor!");
	p4Err=true;
	}
    if(kom.length<2){
     stampajGresku("komErr", "Morate uneti makar dva karaktera.");
  
  komErr = true;

    }
    //Ako postoji greske nemoj izvrsavati formu
    if((p1Err || p2Err || p3Err || p4Err || komErr )==true){return false;}
	else
     return true;    
}
    </script> 
	</main>
<?php include "footer.php" ?>