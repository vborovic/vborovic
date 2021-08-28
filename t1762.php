<?php

# flipkod T1762
/*

Treba napisati klase koje predstavljaju trokut i krug i preko kojih možemo jednostavno izračunati površinu i opseg kruga i trokuta.
Za krug vam je kao parametar dan polumjer a za trokut su dane sve tri stranice i visina na osnovicu.

- nije potrebno raditi nikakav UI

- kod uploadati na Github ili neki sličan servis
- napomenuti kod slanja rješenja koliko vremena vam je bilo potrebno

*/

// funkcije za zagrijavanje

function krug($polumjer){
	$povrsina = $polumjer * $polumjer * pi();
	$opseg = 2 * pi() * $polumjer;
	return array($povrsina,$opseg);
}

function trokut($stranice,$visina){
	$povrsina = ($stranice[$visina[1]] * $visina[0]) / 2;
	$opseg = array_sum($stranice);
	return array($povrsina,$opseg);
}

$krug_polumjer = 5;
$vrijednosti_kruga = krug($krug_polumjer);
echo "F-krug: za polumjer duljine ".$krug_polumjer.", površina kruga iznosi ".$vrijednosti_kruga[0].", a opseg kruga je ".$vrijednosti_kruga[1].".<br /></br />";

$trokut_stranice = array("a" => 3, "b" => 6, "c" => 9);	// a, b, c
$trokut_visina = array(2,"b");	// visina, osnovica
$vrijednosti_trokuta = trokut($trokut_stranice,$trokut_visina);
echo "F-trokut: za duljine stranica a=".$trokut_stranice["a"].", b=".$trokut_stranice["b"].", c=".$trokut_stranice["c"]." i visinu osnovice na stranicu ".$trokut_visina[1]." od ".$trokut_visina[0].", površina trokuta iznosi ".$vrijednosti_trokuta[0].", a opseg trokuta je ".$vrijednosti_trokuta[1].".";

// klase

class izracunajKrug
{
	function povrsina($polumjer){
		return pow($polumjer,2) * pi();
	}
	
	function opseg($polumjer){
		return 2 * pi() * $polumjer;
	}
}

class izracunajTrokut
{
	
	function povrsina(){
		global $trokut_parametri;
		return $trokut_parametri[ord($trokut_parametri[3]) - 97] * $trokut_parametri[4] / 2;	// ascii konverzija slovne oznake - 1 radi pozicije u polju
	}
	
	function opseg(){
		global $trokut_parametri;
		return $trokut_parametri[0] + $trokut_parametri[1] + $trokut_parametri[2];
	}
}

print "<hr /><br />";

$nas_krug = new izracunajKrug();
$polumjer_kruga = 12;
echo "<strong>K-krug: r=".$polumjer_kruga.", P=".$nas_krug -> povrsina($polumjer_kruga).", O=".$nas_krug -> opseg($polumjer_kruga).".</strong><br /><br />";

$nas_trokut = new izracunajTrokut();
$trokut_parametri = array(2,6,8,"c",4);	// a, b, c, stranica nad kojom je visina, visina
echo "<strong>K-trokut: a=".$trokut_parametri[0].", b=".$trokut_parametri[1].", c=".$trokut_parametri[2]." i visinu osnovice na stranicu ".$trokut_parametri[3]." od ".$trokut_parametri[4].", površina trokuta iznosi ".$nas_trokut -> povrsina().", a opseg trokuta je ".$nas_trokut -> opseg().".</strong>";
?>
