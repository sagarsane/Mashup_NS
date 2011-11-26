<?php
	$stuffing = $_POST['stuffing'];
	$stuffing.="|";
	$turkey = fopen("log.txt", 'a') or die("can't open file");
	fwrite($turkey, $stuffing);
	fclose($turkey);
	//echo $stuffing;
?>