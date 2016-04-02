<?php
$EL_liikmesriigid= array( 
array('nimi'=>'Austria', 'kuupaev'=>'1.01.1995', 'pealinn'=>'Viin', 'pindala'=>83858),
array('nimi'=>'Belgia', 'kuupaev'=>'1.01.1958', 'pealinn'=>'Brussel', 'pindala'=>30510),
array('nimi'=>'Bulgaaria', 'kuupaev'=>'1.01.2007', 'pealinn'=>'Sofia', 'pindala'=>110994),
array('nimi'=>'Eesti', 'kuupaev'=>'1.05.2004', 'pealinn'=>'Tallinn', 'pindala'=>45226),
array('nimi'=>'Hispaania', 'kuupaev'=>'1.01.1986', 'pealinn'=>'Madrid', 'pindala'=>504782),
array('nimi'=>'Holland', 'kuupaev'=>'1.01.1958', 'pealinn'=>'Amsterdam', 'pindala'=>41526),
array('nimi'=>'Horvaatia', 'kuupaev'=>'1.07.2013', 'pealinn'=>'Zagreb', 'pindala'=>56543),
array('nimi'=>'Iirimaa', 'kuupaev'=>'1.01.1973', 'pealinn'=>'Dublin', 'pindala'=>70280),
array('nimi'=>'Itaalia', 'kuupaev'=>'1.01.1958', 'pealinn'=>'Rooma', 'pindala'=>301320),
array('nimi'=>'Kreeka', 'kuupaev'=>'1.01.1981', 'pealinn'=>'Ateena', 'pindala'=>131940),
array('nimi'=>'Kupros', 'kuupaev'=>'1.05.2004', 'pealinn'=>'Nikosia', 'pindala'=>9250),
array('nimi'=>'Leedu', 'kuupaev'=>'1.05.2004', 'pealinn'=>'Vilnius', 'pindala'=>65200),
array('nimi'=>'Luksemburg', 'kuupaev'=>'1.01.1958', 'pealinn'=>'Luxembourg', 'pindala'=>2586),
array('nimi'=>'Lati', 'kuupaev'=>'1.05.2004', 'pealinn'=>'Riia', 'pindala'=>64589),
array('nimi'=>'Malta', 'kuupaev'=>'1.05.2004', 'pealinn'=>'Valletta', 'pindala'=>316),
array('nimi'=>'Poola', 'kuupaev'=>'1.05.2004', 'pealinn'=>'Varssavi', 'pindala'=>312685),
array('nimi'=>'Portugal', 'kuupaev'=>'1.01.1986', 'pealinn'=>'Lissabon', 'pindala'=>92931),
array('nimi'=>'Prantsusmaa', 'kuupaev'=>'1.01.1958', 'pealinn'=>'Pariis', 'pindala'=>547030),
array('nimi'=>'Rootsi', 'kuupaev'=>'1.01.1995', 'pealinn'=>'Stockholm', 'pindala'=>449964),
array('nimi'=>'Rumeenia', 'kuupaev'=>'1.01.2007', 'pealinn'=>'Bukarest', 'pindala'=>238391),
array('nimi'=>'Saksamaa', 'kuupaev'=>'1.01.1958/3.10.1990', 'pealinn'=>'Berliin', 'pindala'=>357021),
array('nimi'=>'Slovakkia', 'kuupaev'=>'1.05.2004', 'pealinn'=>'Bratislava', 'pindala'=>48845),
array('nimi'=>'Sloveenia', 'kuupaev'=>'1.05.2004', 'pealinn'=>'Ljubljana', 'pindala'=>20253),
array('nimi'=>'Soome', 'kuupaev'=>'1.01.1995', 'pealinn'=>'Helsingi', 'pindala'=>337030),
array('nimi'=>'Suurbritannia', 'kuupaev'=>'1.01.1973', 'pealinn'=>'London', 'pindala'=>244820),
array('nimi'=>'Taani', 'kuupaev'=>'1.01.1973', 'pealinn'=>'Kopenhaagen', 'pindala'=>43094),
array('nimi'=>'Tsehhi', 'kuupaev'=>'1.05.2004', 'pealinn'=>'Praha', 'pindala'=>78866),
array('nimi'=>'Ungari', 'kuupaev'=>'1.05.2004', 'pealinn'=>'Budapest', 'pindala'=>9303)
	);

echo "<h1>Euroopa Liidu liikmesriigid</h1>";
foreach($EL_liikmesriigid as $liikmesriik):
  echo "<div>";
  echo "<p><b>EL liikmesriik</b>: {$liikmesriik['nimi']},</p>";
  echo "<p><b>liitumise kuupäev</b>: {$liikmesriik['kuupaev']},</p>";
  echo "<p><b>liikmesriigi pealinn</b>: {$liikmesriik['pealinn']},</p>";
  echo "<p><b>liikmesriigi pindala (km&#178;)</b>: {$liikmesriik['pindala']}.</p>";
  echo "</div>";
endforeach;
include('kodutoo_7_3_massiiv.html');
?>