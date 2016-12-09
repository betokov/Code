<?php

function sum($a, $b){
	$c = $a + $b;
	echo "<h2>$a + $b = $c</h2>";
	return $c;
}

function sub($a, $b){
	$c = $a - $b;
	echo "<h2>$a - $b = $c</h2>";
	return $c;
}

function mul($a, $b){
	$c = $a * $b;
	echo "<h2>$a * $b = $c</h2>";
	return $c;
}

function del($a, $b){
	if($b == 0){
		echo "<h2>Делить на 0 нельзя!</h2>";
	}
	else{
	$c = $a / $b;
	echo "<h2>$a : $b = $c</h2>";
	return $c;
	}
}

function sqr($a, $b){
	$c = sqrt($b);
	echo "<h2>&#8730; $b = $c</h2>";
	return $c;
}

function kvad($a, $b){
	$c = pow($a, $b);
	echo "<h2>$a<sup>$b</sup> = $c</h2>";
	return $c;
}

?>