<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pia';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO Artikli2 (ime, opis) VALUES (?, ?)");
$stmt->bind_param("ss", $ime, $opis);

$artikli = [
    ['ime' => 'Pametan telefon', 'opis' => 'Moderni pametan telefon sa velikim ekranom i brzim procesorom.'],
    ['ime' => 'Bluetooth slušalice', 'opis' => 'Bežične slušalice sa odličnim kvalitetom zvuka i dugim trajanjem baterije.'],
    ['ime' => 'Laptop', 'opis' => 'Laptop sa visokim performansama, idealan za rad i zabavu.'],
    ['ime' => 'Televizor', 'opis' => '4K UHD televizor sa širokim spektrom boja i poboljšanim zvukom.'],
    ['ime' => 'Pametan sat', 'opis' => 'Pametan sat koji prati tvoje aktivnosti i zdravlje, sa mnogim korisnim funkcijama.'],
    ['ime' => 'Kamera', 'opis' => 'Profesionalna kamera sa visokim rezolucijama za vrhunske fotografije.'],
    ['ime' => 'Bežični punjač', 'opis' => 'Punjač koji omogućava bežično punjenje mobilnih uređaja.'],
    ['ime' => 'Pametan termostat', 'opis' => 'Pametan termostat koji automatski prilagođava temperaturu u tvojoj kući.'],
    ['ime' => 'Fitness traka', 'opis' => 'Traka za trčanje sa mnogim opcijama za praćenje napretka tokom vežbanja.'],
    ['ime' => 'Električna četkica za zube', 'opis' => 'Električna četkica koja nudi bolje rezultate čišćenja zuba u kraćem vremenu.'],
    ['ime' => 'Gaming računar', 'opis' => 'Računar za vrhunske gaming performanse sa najnovijim grafičkim karticama.'],
    ['ime' => 'Nosivi ruksak', 'opis' => 'Ergonomski ruksak sa funkcijama za nošenje laptopa i drugih uređaja.'],
    ['ime' => 'USB flash drive', 'opis' => 'Prijenosni uređaj za skladištenje podataka sa velikim kapacitetom.'],
    ['ime' => 'Kuhinja robot', 'opis' => 'Višenamenski kuhinjski aparat za brzu pripremu hrane i uštedu vremena.'],
    ['ime' => 'Pametni zvučnik', 'opis' => 'Zvučnik sa ugrađenim asistentom za glasovne komande i reprodukciju muzike.'],
    ['ime' => 'Tablet', 'opis' => 'Tableta sa visokom rezolucijom ekrana i dugotrajnim trajanjem baterije.'],
    ['ime' => 'Kablovi za punjenje', 'opis' => 'Visokokvalitetni kablovi za brzo i sigurno punjenje mobilnih uređaja.'],
    ['ime' => 'Pauza za vežbanje', 'opis' => 'Pametan uređaj koji podseća na pauze za istezanje tokom radnog dana.'],
    ['ime' => 'Bicikl', 'opis' => 'Brzi bicikl sa laganim okvirom i unapređenim sistemom kočenja.'],
    ['ime' => 'Slušalice za igru', 'opis' => 'Slušalice sa odličnim zvučnim kvalitetom i mikrofonom za online igre.'],
    ['ime' => 'Dron', 'opis' => 'Dron sa kamerom za snimanje iz vazduha i dugim vremenom letenja.'],
    ['ime' => 'Tehnička knjiga', 'opis' => 'Specijalizovana knjiga koja pokriva nove tehnologije i inovacije.'],
    ['ime' => 'Profesionalna tastatura', 'opis' => 'Ergonomska tastatura sa mehaničkim tasterima za brzu i preciznu upotrebu.'],
    ['ime' => 'Kamera za sigurnost', 'opis' => 'Kamera za nadzor sa noćnim vidom i mogućnošću pristupa putem aplikacije.'],
    ['ime' => 'Zamrzivač', 'opis' => 'Veliki zamrzivač za čuvanje hrane sa niskom potrošnjom energije.'],
    ['ime' => 'Kompaktni frižider', 'opis' => 'Mini frižider idealan za male prostore i uredi.'],
    ['ime' => 'Pametan uređaj za kuću', 'opis' => 'Uređaj koji omogućava kontrolu svih pametnih uređaja u tvojoj kući.'],
    ['ime' => 'Pametan CV', 'opis' => 'Alat za kreiranje pametnog CV-a koji automatski ažurira tvoje informacije.'],
    ['ime' => 'Aromaterapija difuzor', 'opis' => 'Difuzor sa mogućnošću regulacije mirisa i vlage u prostoru.'],
    ['ime' => 'Grejač', 'opis' => 'Prijenosni grejač koji brzo zagreva prostorije i održava ugodnu temperaturu.'],
    ['ime' => 'Električna romobila', 'opis' => 'Brzi električni romobil sa dugim dometom i kompaktnim dizajnom.'],
    ['ime' => 'Mini projektor', 'opis' => 'Mali projektor za prikazivanje filmova i prezentacija sa visokom rezolucijom.']
];

foreach($artikli as $artikal){
    $ime = $artikal['ime'];
    $opis = $artikal['opis'];

    if($stmt->execute()){
        echo "Artikal $ime uspesno unet u bazu! <br>";
    }
    else {
        echo "Greška pri unosu artikla $ime: " . $stmt->error . "<br>";
    }
}

$stmt->close();
$conn->close();

?>