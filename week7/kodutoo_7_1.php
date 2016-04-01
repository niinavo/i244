<?php

$muutuja="abcdefghijklmnopqrstuvwxyz";
echo "<b>Tekst:</b> $muutuja <br>";
for($i=strlen($muutuja)-1, $j=0; $j<$i; $i--, $j++) {
    list($muutuja[$j], $muutuja[$i]) = array($muutuja[$i], $muutuja[$j]);
}
echo "<b>Ja tekst tagurpidi:</b> $muutuja";
?>